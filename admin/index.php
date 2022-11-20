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
    Redirect_To( 'user_dashboard.php' );
}
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
$sql = "SELECT * FROM users WHERE user_id = $UserId";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    $fetch_user_profile = mysqli_fetch_assoc( $query );
}
?>

<!-- Get all Admin Users -->
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

    <!-- Main area section -->
    <section class='main_admin_dashboard_container'>
      <?php
echo SuccessMessage();
echo ErrorMessage();
?>
      <div class='main_inner_admin_dashboard_content_container'>
        <div class='admin_dashboard_items_box'>
          <!-- Get all blog posts -->
          <h2>Number of Posts</h2>
          <h4>
            <i class='fab fa-readme'></i>
            <?php
$sql = 'SELECT * FROM blogs';
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
echo $rows;
?>
          </h4>
        </div>
        <div class='admin_dashboard_items_box'>
          <!-- Get all categories -->
          <h2>Categories</h2>
          <h4>
            <i class='fa fa-folder'></i>
            <?php
$sql = 'SELECT * FROM categories';
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
echo $rows;
?>
          </h4>
        </div>
        <div class='admin_dashboard_items_box'>
          <!-- Get all Users -->
          <h2>Number of Users</h2>
          <h4>
            <i class='fa fa-users'></i>
            <?php
$sql = 'SELECT * FROM users';
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