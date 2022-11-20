<ul class="navbar-nav sidebar sidebar-dark accordion custom_admin_sidebar_box" id="accordionSidebar">
  <?php
if (isset($_SESSION['user_data'])) {
  $admin = $_SESSION['user_data']['2'];
}
if ($admin == 1) {
    ?>
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    Admin
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="index.php"> <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="profile.php"> <span>Profile</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="blogs.php"> <span>Blogs</span></a>
  </li>

  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="categories.php"> <span>Categories</span> </a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="users.php"> <span>View Users</span> </a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  <?php } else {
?>
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user_dashboard.php">
    User
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="user_dashboard.php"> <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="profile.php"> <span>Profile</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="blogs.php"> <span>Blogs</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="user.php"> <span>My Account</span></a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  <?php
  } ?>

</ul>
