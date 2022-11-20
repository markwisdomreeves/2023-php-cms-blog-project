<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php $_SESSION[ 'TrackingURL' ] = $_SERVER[ 'PHP_SELF' ];
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
if ( isset( $_POST[ 'add_new_category' ] ) ) {
    $CategoryName = mysqli_real_escape_string( $conn, $_POST[ 'CategoryName' ] );
    if ( empty( $CategoryName ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'Category field is required';
        Redirect_To( 'add-category.php' );
    } elseif ( strlen( $CategoryName ) < 3 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Category can not be less than 3 chars';
        Redirect_To( 'add-category.php' );
    } elseif ( strlen( $CategoryName ) > 15 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Category can not be greater than 15 chars';
        Redirect_To( 'add-category.php' );
    }
    $sql1 = "SELECT * FROM categories WHERE cat_name='{$CategoryName}'";
    $query1 = mysqli_query( $conn, $sql1 );
    $row = mysqli_num_rows( $query1 );
    if ( $row > 0 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Category name already exists';
        Redirect_To( 'add-category.php' );
    } else {
        $sql2 = "INSERT INTO categories (cat_name) VALUES('$CategoryName')";
        $query2 = mysqli_query( $conn, $sql2 );
        if ( $query2 ) {
            $_SESSION[ 'SuccessMessage' ] = 'Category has been added successfully';
            Redirect_To( '../admin/categories.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( 'add-category.php' );
        }
    }
}

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>Add Category</title>
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
<h5 class = 'mb-2 mb-4 text-gray-800'>Add Category</h5>
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
<form action = 'add-category.php' method = 'POST'>
<div class = 'form-group'>
<input type = 'text' class = 'form-control' name = 'CategoryName' id = 'CategoryName'
placeholder = 'Enter category name'>
</div>
<button type = 'submit' class = 'btn custom_add_category_btn' name = 'add_new_category'>Add Category</button>
</form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>

<?php include( './inc/adminFooter.php' );
?>
