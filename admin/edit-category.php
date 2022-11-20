<?php
include( '../includes/config.php' );
?>
<?php
include( '../includes/session.php' );
?>
<?php
include( '../includes/functions.php' );
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
// Update Category
$categoryId = $_GET[ 'category_id' ];
if ( isset( $_POST[ 'update_category_btn' ] ) ) {
    $updateCategory = mysqli_real_escape_string( $conn, $_POST[ 'CategoryName' ] );
    $sql = "UPDATE categories SET cat_name = '$updateCategory' WHERE cat_id='$categoryId'";
    $result = mysqli_query( $conn, $sql );
    if ( $result ) {
        $_SESSION[ 'SuccessMessage' ] = 'Category has been updated successfully';
        Redirect_To( 'categories.php' );
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
        Redirect_To( 'categories.php' );
    }
}

?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>Edit Category</title>
<?php include( './inc/adminHead.php' );
?>
</head>

<body id = 'page-top'>
<!-- Page Wrapper -->
<div id = 'wrapper'>
<?php include( './inc/adminHeader.php' );
?>
<!-- Begin Page Content -->
<div class = 'container custom_category_container'>
<h5 class = 'mb-2 mb-4 text-gray-800'>Edit Category</h5>
<?php
echo SuccessMessage();
echo ErrorMessage();
?>
<!-- DataTales Example -->
<div class = 'card shadow'>
<div class = 'card-body'>
<div class = 'custom_category_box'>
<a href = 'categories.php'>
<h6 class = 'font-weight-bold mt-2 mb-3'>View Categories</h6>
</a>
</div>
<form action = '' method = 'POST'>

<?php
$sql = "SELECT * FROM categories WHERE cat_id = '$categoryId'";
$result = mysqli_query( $conn, $sql );
if ( mysqli_num_rows( $result ) > 0 ) {
    while ( $row = mysqli_fetch_assoc( $result ) ) {
        ?>
        <div class = 'form-group'>
        <input type = 'text' class = 'form-control' name = 'CategoryName' id = 'CategoryName'
        value = "<?php echo $row['cat_name']; ?>" placeholder = 'Edit Category'>
        </div>
        <?php }
    }
    ?>
    <button type = 'submit' class = 'btn custom_edit_category_btn' name = 'update_category_btn'>Update
    Category</button>
    </form>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>

    <?php include( './inc/adminFooter.php' );
    ?>
