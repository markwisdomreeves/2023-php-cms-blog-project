<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $admin = $_SESSION[ 'user_data' ][ '2' ];
}
if ( $admin != 1 ) {
    Redirect_To( 'index.php' );
}
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<?php
// Start of getting pagination from URL and fixing the issues
if ( !isset( $_GET[ 'page' ] ) ) {
    $page = 1;
} else {
    $page = $_GET[ 'page' ];
}
// Find Pagination Offset and set Limit in select query
$limit = 6;
$offset = ( $page-1 )*$limit;
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>Categories page</title>
<?php include( './inc/adminHead.php' );
?>
</head>

<body id = 'page-top'>
<!-- Page Wrapper -->
<div id = 'wrapper'>
<?php include( './inc/adminHeader.php' );
?>
<!-- Begin Page Content -->
<div class = 'container-fluid custom_category_container'>
<!-- Page Heading -->
<h5 class = 'mb-2 mb-4 text-gray-800'>Category Lists</h5>
<?php
echo SuccessMessage();
echo ErrorMessage();
?>
<!-- DataTales Example -->
<div class = 'card shadow'>
<div class = 'card-header py-3 d-flex justify-content-between'>
<div class = 'custom_category_box'>
<a href = 'add-category.php'>
<h6 class = 'font-weight-bold mt-2'>Add New Category</h6>
</a>
</div>
</div>
<div class = 'card-body'>
<div class = 'table-responsive custom_admin_table_container'>
<table class = 'table table-bordered' id = 'dataTable' width = '100%' cellspacing = '0'>
<thead>
<tr>
<th>Sr.No</th>
<th>Category Name</th>
<th colspan = '2'>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM categories limit $offset, $limit";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    while ( $row = mysqli_fetch_assoc( $query ) ) {
        ?>
        <tr>
        <td>
        <?php echo ++$offset;
        ?>
        </td>
        <td>
        <?php echo $row[ 'cat_name' ];
        ?>
        </td>
        <td>
        <a href = 'edit-category.php?category_id=<?php echo $row[ 'cat_id'];?>'

        class = 'btn btn-sm btn-info'>Edit</a>
        </td>
        <td>
        <a href = "delete-category.php?category_id=<?php echo $row[ 'cat_id']; ?>"

        class = 'btn-sm btn-danger'>Delete</a>
        </td>
        </tr>

        <?php

    }
} else {
    ?>
    <tr>
    <td colspan = '4'>
    <h5>No Category Record Found</h5>
    </td>
    </tr>
    <?php
}
?>
</tbody>
</table>
<!-- Adding pagination on admin blog posts table -->
<?php
$pagination = 'SELECT * FROM categories';
$run_query = mysqli_query( $conn, $pagination );
$total_num_of_posts = mysqli_num_rows( $run_query );
$pages = ceil( $total_num_of_posts/$limit );

// Start of showing pagination btn allowing to the number of posts
if ( $total_num_of_posts > $limit ) {
    ?>
    <ul class = 'pagination pt-2 pb-5'>
    <?php for ( $i = 1; $i <= $pages; $i++ ) {
        ?>
        <li class = 'page-item'>
        <a href = 'categories.php?page=<?php echo $i; ?>' class = 'page-link' style = 'color: #18151f;'>
        <?php echo $i;
        ?>
        </a>
        </li>
        <?php }
        ?>
        </ul>
        <?php }
        ?>
        </div>
        </div>
        </div>
        </div>
        </div>

        <?php include( './inc/adminFooter.php' );
        ?>
