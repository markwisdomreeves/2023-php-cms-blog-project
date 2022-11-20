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
ConfirmIfUserIsLoginOrNot();
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
$userId = $_GET[ 'id' ];
if ( empty( $userId ) ) {
    Redirect_To( 'users.php' );
}
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
$sql = "SELECT * FROM users WHERE user_id = '$userId'";
$query = mysqli_query( $conn, $sql );
$result = mysqli_fetch_assoc( $query );
?>

<?php
if ( isset( $_POST[ 'update_user_btn' ] ) ) {
    $UserRole =  mysqli_real_escape_string( $conn, $_POST[ 'UserRole' ] );
    $sql = "UPDATE users SET user_role = '$UserRole' WHERE user_id='$userId'";
    $result = mysqli_query( $conn, $sql );
    if ( $result ) {
        $_SESSION[ 'SuccessMessage' ] = 'User has been updated successfully';
        Redirect_To( 'users.php' );
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
        Redirect_To( 'users.php' );
    }
}

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>Edit User</title>
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
<h5 class = 'mb-2 mb-4 text-gray-800'>Edit User</h5>
<?php
echo SuccessMessage();
echo ErrorMessage();
?>
<!-- DataTales Example -->
<div class = 'card shadow'>
<div class = 'card-body'>
<div class = 'custom_category_box'>
<a href = 'users.php'>
<h6 class = 'font-weight-bold mt-2 mb-3'>View Users</h6>
</a>
</div>
<form action = '' method = 'POST'>
<div class = 'form-group mb-3 mt-3'>
<select name = 'UserRole' id = 'UserRole' class = 'form-control'>
<option value = ''>Update Role</option>
<option value = '1'>Admin</option>
<option value = '0'>Co-Admin</option>
</select>
</div>
<div class = 'form-group mb-3'>
<input type = 'text' name = 'JobTitle' id = 'JobTitle' class = 'form-control' placeholder = 'Add Job Title'
value = "<?php echo htmlentities($result['job_title']); ?>" disabled>
</div>
<div class = 'form-group mb-3'>
<input type = 'text' name = 'UserName' id = 'UserName' class = 'form-control' placeholder = 'Add Full Name'
value = "<?php echo htmlentities($result['username']); ?>" disabled>
</div>
<div class = 'form-group mb-3'>
<input type = 'email' name = 'UserEmail' id = 'UserEmail' class = 'form-control' placeholder = 'Add Email Address'
value = "<?php echo htmlentities($result['email']); ?>" disabled>
</div>
<div class = 'form-group mb-3 custom_add_user_bio_text_box'>
<span class = 'text-dark'>Please tell the viewers more about yourself.</span>
<textarea name = 'UserBioInfo' id = 'UserBioInfo' cols = '30' rows = '10' disabled>
<?php echo htmlentities( $result[ 'user_bio' ] );
?>
</textarea>
</div>
<button type = 'submit' class = 'btn custom_edit_category_btn' name = 'update_user_btn'>Update
User Info</button>
</form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>

<?php include( './inc/adminFooter.php' );
?>
