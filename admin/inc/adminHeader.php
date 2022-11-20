<?php
if ( !isset( $_SESSION[ 'user_data' ] ) ) {
    header( 'Location: http://markdev.live/login.php' );
}
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $UserId = $_SESSION[ 'user_data' ][ '0' ];
}
?>

<?php
$sql = "SELECT * FROM users WHERE user_id = $UserId";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    $fetch_user_profile = mysqli_fetch_assoc( $query );
}
?>

<?php include( './inc/adminSidebar.php' );
?>

<div id = 'content-wrapper' class = 'd-flex flex-column'>
<div id = 'content'>
<nav class = 'navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>
<button id = 'sidebarToggleTop' class = 'btn btn-link d-md-none rounded-circle mr-3'> <i class = 'fa fa-bars'></i>
</button>
<ul class = 'navbar-nav ml-auto'>
<li class = 'nav-item dropdown no-arrow'>
<a class = 'nav-link dropdown-toggle' href = '#' id = 'userDropdown' role = 'button' data-toggle = 'dropdown'
aria-haspopup = 'true' aria-expanded = 'false'> <span style = 'color:  #18151f;'

class = 'mr-2 d-none d-lg-inline small font-weight-bold'>
<?php echo $fetch_user_profile[ 'username' ];
?>
</span>
<img class = 'img-profile rounded-circle' src = "../admin/avatar/<?php echo $fetch_user_profile['avatar']; ?>"
alt = ''>
</a>
<div class = 'dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby = 'userDropdown'>
<a class = 'dropdown-item' href = 'profile.php'> <i class = 'fas fa-user fa-sm fa-fw mr-2 custom_admin_icon'></i>
Profile
</a>
<div class = 'dropdown-divider'></div>
<a class = 'dropdown-item' href = 'http://markdev.live/index.php' target = '_blank'>
<i class = 'fas fa-home fa-sm fa-fw mr-2 custom_admin_icon' aria-hidden = 'true'></i>
Frontend
</a>
<div class = 'dropdown-divider'></div>
<a class = 'dropdown-item' href = 'http://markdev.live/logout.php'> <i

class = 'fas fa-sign-out-alt fa-sm fa-fw mr-2 custom_admin_logout_icon'></i> Logout
</a>
</div>
</li>
</ul>
</nav>
