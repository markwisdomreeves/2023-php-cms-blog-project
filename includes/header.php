 <!-- Making a dynamic active link -->
 <?php
$page = basename( $_SERVER[ 'PHP_SELF' ], '.php' );
?>

 <!-- Start of Navbar section -->
 <nav class='navbar navbar-expand-lg navbar-dark' style='background: #18151f;'>
   <?php if (isset($_SESSION['user_data'])) : ?>
   <div class='container'>
     <a class='navbar-brand' href='index.php'>CUSTOM'S BLOG</a>
     <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarColor02'
       aria-controls='navbarColor02' aria-expanded='false' aria-label='Toggle navigation'>
       <span class='navbar-toggler-icon'></span>
     </button>
     <div class='collapse navbar-collapse' id='navbarColor02'>
       <ul class='navbar-nav me-auto'>
         <?php
         if (isset($_SESSION['user_data'])) {
  $admin = $_SESSION['user_data']['2'];
}
if ($admin == 1) {
  ?>
         <li class='nav-item'>
           <a class='nav-link <?= ($page=="index") ? "active" : " " ?>' href='admin/index.php'>Dashboard</a>
         </li>
         <?php
} else {
   ?>
         <li class='nav-item'>
           <a class='nav-link <?= ($page=="index") ? "active" : " " ?>' href='admin/user_dashboard.php'>Dashboard</a>
         </li>
         <?php
}

         ?>

       </ul>

       <?php
       if (isset($_GET['keyword'])) {
         $keyword = $_GET['keyword'];
       } else {
         $keyword = "";
       }
        ?>

       <div class="custom_search_form_box">
         <div class="custom_login_link_box">
           <li class='nav-item'>
             <a class='nav-link text-danger <?= ($page=="login") ? "active" : " " ?>' href='logout.php'>Logout</a>
           </li>
         </div>
         <form class='d-flex custom_form_search_input_box custom_search_form_item' action="search.php" method="GET">
           <input class='form-control me-sm-2' type='text' name="keyword" placeholder='Search an article' maxlength="70"
             autocomplete="off" value="<?php echo strtolower($keyword); ?>" required>
           <button class='btn my-2 my-sm-0' type='submit'>Search</button>
         </form>
       </div>
     </div>
   </div>
   <?php else: ?>
   <div class='container p-2'>
     <a class='navbar-brand' href='index.php'>CUSTOM'S BLOG</a>
     <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarColor02'
       aria-controls='navbarColor02' aria-expanded='false' aria-label='Toggle navigation'>
       <span class='navbar-toggler-icon'></span>
     </button>
     <div class='collapse navbar-collapse' id='navbarColor02'>
       <ul class='navbar-nav me-auto'>

       </ul>

       <?php
       if (isset($_GET['keyword'])) {
         $keyword = $_GET['keyword'];
       } else {
         $keyword = "";
       }
        ?>

       <div class="custom_search_form_box">
         <div class="custom_login_link_box">
           <li class='nav-item'>
             <a class='nav-link text-white <?= ($page=="login") ? "active" : " " ?>' href='login.php'>Login</a>
           </li>
         </div>
         <form class='d-flex custom_form_search_input_box' action="search.php" method="GET">
           <input class='form-control me-sm-2' type='text' name="keyword" placeholder='Search an article' maxlength="70"
             autocomplete="off" value="<?php echo strtolower($keyword); ?>" required>
           <button class='btn my-2 my-sm-0' type='submit'>Search</button>
         </form>
       </div>
     </div>
   </div>
   <?php endif; ?>
 </nav>
 <!-- End of Navbar section -->
