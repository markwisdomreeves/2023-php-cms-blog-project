<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $UserId = $_SESSION[ 'user_data' ][ '0' ];
}
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<!-- Retriving user profile -->
<?php
$sql = "SELECT * FROM users WHERE user_id = '$UserId'";
$result = mysqli_query( $conn, $sql );
$UserInfo = mysqli_fetch_assoc( $result );
?>

<!-- Update user profile -->
<?php
if ( isset( $_POST[ 'update_user_profile_btn' ] ) ) {
    $JobTitle = mysqli_real_escape_string( $conn, $_POST[ 'JobTitle' ] );
    $UserName = mysqli_real_escape_string( $conn, $_POST[ 'UserName' ] );
    $UserEmail = mysqli_real_escape_string( $conn, $_POST[ 'UserEmail' ] );
    $UserBioInfo = mysqli_real_escape_string( $conn, $_POST[ 'UserBioInfo' ] );
    $Avatar = $_FILES[ 'UserAvatar' ][ 'name' ];
    $tmp_name = $_FILES[ 'UserAvatar' ][ 'tmp_name' ];
    $image_ext = strtolower( pathinfo( $Avatar, PATHINFO_EXTENSION ) );
    $allow_type = [ 'jpg', 'png', 'gif', 'jpeg' ];
    $destination = '../admin/avatar/'.$Avatar;

    if ( !empty( $Avatar ) ) {
        if ( in_array( $image_ext, $allow_type ) ) {
            $unlink = '../admin/avatar/'. $UserInfo[ 'avatar' ];
            unlink( $unlink );
            move_uploaded_file( $tmp_name, $destination );
            $sql1 = "UPDATE users SET job_title = '$JobTitle', username = '$UserName', email = '$UserEmail', user_bio = '$UserBioInfo', avatar = '$Avatar' WHERE user_id = '$UserId'";
            $query1 = mysqli_query( $conn, $sql1 );
            if ( $query1 ) {
                $_SESSION[ 'SuccessMessage' ] = 'User Profile has been updated successfully';
                Redirect_To( 'profile.php' );
            } else {
                $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
                Redirect_To( 'update-profile.php' );
            }

        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Image type is not allowed (only jpg, jpeg, png and gif)';
            Redirect_To( 'update-profile.php' );
        }
    } else {
        $sql2 = "UPDATE users SET job_title = '$JobTitle', username = '$UserName', email = '$UserEmail', user_bio = '$UserBioInfo', WHERE user_id = '$UserId'";
        $query2 = mysqli_query( $conn, $sql2 );
        if ( $query2 ) {
            $_SESSION[ 'SuccessMessage' ] = 'User Profile has been updated successfully';
            Redirect_To( 'profile.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( 'update-profile.php' );
        }
    }
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Update Profile</title>
  <?php include( './inc/adminHead.php' );
?>
</head>

<body id='page-top'>
  <!-- Page Wrapper -->
  <div id='wrapper'>
    <?php include( './inc/adminHeader.php' );
?>
    <!-- Begin Page Content -->
    <div class='container main_custom_add_new_user_container'>
      <div class='row'>
        <div class='col-xxl-8 col-xl-8 col-md-10 col-sm-12 m-auto add_new_user_form_container'>
          <?php
echo SuccessMessage();
echo ErrorMessage();
?>

          <h5 class='mb-3 text-gray-800'>Update Profile</h5>
          <form action='update-profile.php' method='POST' enctype='multipart/form-data'>
            <div class='form-group mb-3'>
              <input type='text' name='JobTitle' id='JobTitle' class='form-control' placeholder='Edit Job Title'
                value="<?php echo htmlentities($UserInfo['job_title']); ?>" required>
            </div>
            <div class='form-group mb-3'>
              <input type='text' name='UserName' id='UserName' class='form-control' placeholder='Edit Full Name'
                value="<?php echo htmlentities($UserInfo['username']); ?>" required>
            </div>
            <div class='form-group mb-3'>
              <input type='email' name='UserEmail' id='UserEmail' class='form-control' placeholder='Edit Email Address'
                value="<?php echo htmlentities($UserInfo['email']); ?>" required>
            </div>
            <div class='form-group mb-3 custom_add_user_bio_text_box'>
              <span class='text-dark'>Please tell the viewers more about yourself.</span>
              <textarea name='UserBioInfo' id='UserBioInfo' cols='30' rows='10' placeholder='Edit User Bio' required>
<?php echo htmlentities( $UserInfo[ 'user_bio' ] );
?>
</textarea>
            </div>
            <div class='form-group mb-3'>
              <label for='UserAvatar' style='color: black;'>Existing User Avatar </label>
              <img src="../admin/avatar/<?php echo $UserInfo['avatar']; ?>" class='custom_update_avatar'
                alt='user_avatar_img'>
              <input type='file' accept='image/*' class='form-control' name='UserAvatar' id='UserAvatar' required>
            </div>
            <div class='custom_add_blog_post_box form-group mb-2'>
              <button type='submit' class='btn mt-3' name='update_user_profile_btn'>Update Profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <?php include( './inc/adminFooter.php' );
?>