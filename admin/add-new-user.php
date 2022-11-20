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

if ( isset( $_POST[ 'add_new_user_btn' ] ) ) {
    $JobTitle = mysqli_real_escape_string( $conn, $_POST[ 'JobTitle' ] );
    $UserName = mysqli_real_escape_string( $conn, $_POST[ 'UserName' ] );
    $UserEmail = mysqli_real_escape_string( $conn, $_POST[ 'UserEmail' ] );
    $UserPassword =  mysqli_real_escape_string( $conn, sha1( $_POST[ 'UserPassword' ] ) );
    $ConfirmUserPassword =  mysqli_real_escape_string( $conn, sha1( $_POST[ 'ConfirmUserPassword' ] ) );
    $UserBioInfo = mysqli_real_escape_string( $conn, $_POST[ 'userBioInfo' ] );
    $Avatar = $_FILES[ 'UserAvatar' ][ 'name' ];
    $UserRole =  mysqli_real_escape_string( $conn, $_POST[ 'UserRole' ] );

    if ( empty( $JobTitle ) || empty( $UserName ) || empty( $UserEmail ) || empty( $UserBioInfo ) || empty( $Avatar ) || empty( $UserPassword ) || empty( $ConfirmUserPassword ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All User fields are required';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $UserName ) < 5 || strlen( $UserName ) > 40 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Full Name must be between 5 to 40 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $JobTitle ) < 4 || strlen( $JobTitle ) > 40 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Job Title must be between 4 to 40 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $UserBioInfo ) < 10 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Your bio info must be more than 10 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $UserBioInfo ) > 800 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Your bio info should not be greater than 800 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $UserPassword ) < 5 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Password must be at least 5 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( strlen( $ConfirmUserPassword ) < 5 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Password must be at least 5 characters long';
        Redirect_To( 'add-new-user.php' );
    } elseif ( $UserPassword != $ConfirmUserPassword ) {
        $_SESSION[ 'ErrorMessage' ] = 'Password and Confirm password must be the same';
        Redirect_To( 'add-new-user.php' );
    }
    $tmp_name = $_FILES[ 'UserAvatar' ][ 'tmp_name' ];
    $image_ext = strtolower( pathinfo( $Avatar, PATHINFO_EXTENSION ) );
    $allow_type = [ 'jpg', 'png', 'gif', 'jpeg' ];
    $destination = '../admin/avatar/'.$Avatar;
    if ( in_array( $image_ext, $allow_type ) ) {
        move_uploaded_file( $tmp_name, $destination );
        $sql = "SELECT * FROM users WHERE email='$UserEmail'";
        $query = mysqli_query( $conn, $sql );
        $row = mysqli_num_rows( $query );
        if ( $row >= 1 ) {
            $_SESSION[ 'ErrorMessage' ] = 'Email address already exists our database';
            Redirect_To( 'add-new-user.php' );
        } else {
            $sql2 = "INSERT INTO users (job_title,username,email,user_bio,avatar,password,user_role) VALUES('$JobTitle', '$UserName', '$UserEmail', '$UserBioInfo', '$Avatar', '$UserPassword','$UserRole')";
            $query2 = mysqli_query( $conn, $sql2 );
            if ( $query2 ) {
                $_SESSION[ 'SuccessMessage' ] = 'New user has been added successfully';
                Redirect_To( 'users.php' );
            } else {
                $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
                Redirect_To( 'add-new-user.php' );
            }
        }
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Image type is not allowed (only jpg, jpeg, png and gif)';
        Redirect_To( 'add-new-user.php' );
    }
}

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>New User</title>
<?php include( './inc/adminHead.php' );
?>
</head>

<body id = 'page-top'>
<!-- Page Wrapper -->
<div id = 'wrapper'>
<?php include( './inc/adminHeader.php' );
?>
<!-- Begin Page Content -->
<div class = 'container main_custom_add_new_user_container'>
<div class = 'row'>
<div class = 'col-xxl-8 col-xl-8 col-md-10 col-sm-12 m-auto add_new_user_form_container'>
<?php
echo SuccessMessage();
echo ErrorMessage();
?>
<h5 class = 'mb-3 text-gray-800'>Add New User</h5>
<form action = 'add-new-user.php' method = 'POST' enctype = 'multipart/form-data'>
<div class = 'form-group mb-3'>
<input type = 'text' name = 'JobTitle' id = 'JobTitle' class = 'form-control'
placeholder = 'Add Job Title (Optional)'>
</div>
<div class = 'form-group mb-3'>
<input type = 'text' name = 'UserName' id = 'UserName' class = 'form-control' placeholder = 'Add Full Name'>
</div>
<div class = 'form-group mb-3'>
<input type = 'email' name = 'UserEmail' id = 'UserEmail' class = 'form-control' placeholder = 'Add Email Address'>
</div>
<div class = 'form-group mb-3'>
<input type = 'password' name = 'UserPassword' id = 'UserPassword' class = 'form-control'
placeholder = 'Add Password'>
</div>
<div class = 'form-group mb-3'>
<input type = 'password' name = 'ConfirmUserPassword' id = 'ConfirmUserPassword' class = 'form-control'
placeholder = 'Confirm Password'>
</div>
<div class = 'form-group mb-3 custom_add_user_bio_text_box'>
<span class = 'text-dark'>Please tell the viewers more about yourself.</span>
<textarea name = 'userBioInfo' id = 'userBioInfo' cols = '30' rows = '10'></textarea>
</div>
<div class = 'form-group mb-3'>
<label for = 'UserAvatar'>User Avatar</label>
<input type = 'file' accept = 'image/*' class = 'form-control' name = 'UserAvatar' id = 'UserAvatar'>
</div>
<div class = 'form-group mb-3 mt-3'>
<select name = 'UserRole' id = 'UserRole' class = 'form-control' required>
<option value = ''>Select Role</option>
<option value = '1'>Admin</option>
<option value = '0'>Co-Admin</option>
</select>
</div>
<div class = 'custom_add_blog_post_box form-group mb-2'>
<button type = 'submit' class = 'btn mt-3' name = 'add_new_user_btn'>New User</button>
</div>
</form>
</div>
</div>
</div>

</div>

<?php include( './inc/adminFooter.php' );
?>
