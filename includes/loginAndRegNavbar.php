 <!-- Making a dynamic active link -->
 <?php
$page = basename( $_SERVER[ 'PHP_SELF' ], '.php' );
?>
 <!-- Start of Navbar section -->
 <nav class='navbar navbar-expand-lg navbar-dark' style='background: #18151f;'>
   <?php if (isset($_SESSION['user_data'])) : ?>
   <div class='container custom_login_and_register_navbar_box'>
     <a class='navbar-brand' href='index.php'>CUSTOM'S BLOG</a>
     <ul class='inner_custom_login_and_register_navbar_box'>
       <li>
         <a class='nav-link text-danger <?= ($page=="login") ? "active" : " " ?>' href='logout.php'>Logout</a>
       </li>
     </ul>
   </div>
   <?php else: ?>
   <div class='container custom_login_and_register_navbar_box'>
     <a class='navbar-brand' href='index.php'>CUSTOM'S BLOG</a>
     <ul class='inner_custom_login_and_register_navbar_box'>
       <li>
         <a class='nav-link text-white <?= ($page=="login") ? "active_class" : " " ?>' href='login.php'>Login</a>
       </li>
       <li>
         <a class='nav-link text-white <?= ($page=="register") ? "active_class" : " " ?>'
           href='register.php'>Register</a>
       </li>
     </ul>
   </div>
   <?php endif; ?>
 </nav>
 <!-- End of Navbar section -->