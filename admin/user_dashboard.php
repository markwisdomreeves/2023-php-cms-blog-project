<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php

if ( !isset( $_SESSION[ 'user_data' ][ '2' ] ) ) {
    Redirect_To( 'login.php' );
}
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $UserId = $_SESSION[ 'user_data' ][ '0' ];
}
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $admin = $_SESSION[ 'user_data' ][ '2' ];
}
if ( $admin != 0 ) {
    Redirect_To( 'index.php' );
}
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<?php
$sql = "SELECT * FROM users WHERE user_id = $UserId";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    $fetch_user_profile = mysqli_fetch_assoc( $query );
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>User Dashboard</title>
  <?php include( './inc/adminHead.php' );
?>
</head>

<body id='page-top'>
  <!-- Page Wrapper -->
  <div id='wrapper'>
    <?php include( './inc/adminHeader.php' );
?>

    <!-- Main area section -->
    <section class='main_admin_dashboard_container'>
      <?php
echo SuccessMessage();
echo ErrorMessage();
?>
      <div class='main_inner_admin_dashboard_content_container'>
        <div class='admin_dashboard_personal_user_items_box'>
          <h5 style='text-align: center;'>
            <?php echo $fetch_user_profile[ 'job_title' ];
?>
          </h5>
          <h2>
            <?php echo $fetch_user_profile[ 'username' ];
?>
          </h2>
          <h4><?php echo $fetch_user_profile[ 'email' ];
?></h4>
          <img src="../admin/avatar/<?php echo $fetch_user_profile['avatar']; ?>" class='rounded-circle'
            alt='admin_avatar'>

          </h4>
        </div>
        <div class='admin_dashboard_items_box'>
          <h1>Number of User</h1>
          <h4>
            <!-- Get all blog posts -->
            <i class='fa fa-users'></i>
            <?php
$sql = "SELECT * FROM users WHERE user_id = '$UserId'";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
echo $rows;
?>
          </h4>
        </div>
        <div class='admin_dashboard_items_box'>
          <h1>Number of Posts</h1>
          <h4>
            <!-- Get all blog posts -->
            <i class='fab fa-readme'></i>
            <?php
$sql = "SELECT * FROM blogs WHERE author_id = '$UserId'";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
echo $rows;
?>
          </h4>
        </div>
      </div>
    </section>

  </div>

  <?php include( './inc/adminFooter.php' );
?>