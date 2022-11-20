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

<?php
$sql = "SELECT * FROM users WHERE user_id = '$UserId'";
$result = mysqli_query( $conn, $sql );
$UserInfo = mysqli_fetch_assoc( $result );
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Admin Dashboard</title>
  <?php include( './inc/adminHead.php' );
?>
</head>

<body id='page-top'>
  <!-- Page Wrapper -->
  <div id='wrapper'>
    <?php include( './inc/adminHeader.php' );
?>
    <!-- Begin Page Content -->
    <div class='container-fluid'>
      <div class='main_user_profile_container'>
        <div class='inner_main_user_profile_container'>
          <?php
echo SuccessMessage();
echo ErrorMessage();
?>
          <div class='user_profile_content_box'>
            <img src="../admin/avatar/<?php echo htmlentities($UserInfo['avatar']); ?>" alt='user_avatar_img'>
            <div class='user_profile_text_info_box'>
              <h4><?php echo htmlentities( $UserInfo[ 'job_title' ] );
?></h4>
              <h1><?php echo htmlentities( $UserInfo[ 'username' ] );
?></h1>
              <h5>
                <?php echo htmlentities( $UserInfo[ 'email' ] );
?>
              </h5>
              <h6 style='color: brown;'>
                Login Status:
                <?php $user_role = $UserInfo[ 'user_role' ];
if ( $user_role == 1 ) {
    echo 'Admin';
} else {
    echo 'Normal User';
}
?>
              </h6>

              <p><?php echo nl2br( $UserInfo[ 'user_bio' ] );
?></p>
            </div>

          </div>
          <a href='update-profile.php' class='btn btn-sm'
            style='background: #18151f; color: #fff; margin-top: 10px;'>Update
            Profile</a>
        </div>
      </div>

    </div>

  </div>

  <?php include( './inc/adminFooter.php' );
?>