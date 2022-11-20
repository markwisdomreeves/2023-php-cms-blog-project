<?php include( './includes/config.php' );
?>

<?php include( './includes/session.php' );
?>

<?php include( './includes/functions.php' );
?>

<?php
$id = $_GET[ 'id' ];
if ( empty( $id ) ) {
    Redirect_To( 'index.php' );
}

$sql = "SELECT * FROM blogs LEFT JOIN categories ON blogs.category=categories.cat_id LEFT JOIN users ON blogs.author_id=users.user_id WHERE blog_id='$id'";
$result = mysqli_query( $conn, $sql );
$blogPost = mysqli_fetch_assoc( $result );
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Blog detail</title>
  <?php include( './includes/head.php' );
?>
</head>

<?php include( './includes/header.php' );
?>

<body>
  <div class='container custom_blog_details_page_margin_top_box'>
    <div class='row'>
      <div class='col-lg-8'>
        <div class='card shadow'>
          <div class='card-body'>
            <a href="./uploads/<?php echo $blogPost['blog_image'] ?>">
              <img src="./uploads/<?php echo $blogPost['blog_image'] ?>" style='width:100%;' alt='blog-detail-img'
                class='img-fluid'>
            </a>
            <hr>
            <div class='custom_share_btn_and_others_items_box'>
              <div class='inner_custom_share_btn_and_others_items_box'>
                <li>
                  <a href='profile.php?username=<?php echo htmlentities( $blogPost['user_id']); ?>'>
                    <img class='img-profile rounded-circle custom_user_avatar_img'
                      src="./admin/avatar/<?php echo htmlentities($blogPost['avatar']); ?>" alt='user_avatar_img'>
                    <?php
$user_role = $blogPost[ 'user_role' ];

if ( $user_role == 1 ) {
    $Admin = 'Admin';
    echo $blogPost[ 'username' ].' '. "<span>($Admin)</span>";
} else {
    $Co_Admin = 'User';
    echo $blogPost[ 'username' ].' '. "<span>($Co_Admin)</span>";
}
?>
                  </a>
                </li>
                <a href="category.php?id=<?= $blogPost['cat_id']; ?>">
                  <i class='fa fa-tags' aria-hidden='true'>
                    Category:
                  </i>
                  <span><?php echo $blogPost[ 'cat_name' ];
?></span>
                </a>
                <span>
                  <i class='fa fa-calendar-o' aria-hidden='true'>
                    <?php $date = $blogPost[ 'publish_date' ];
?>
                  </i>
                  <?php echo date( 'd-M-Y', strtotime( $date ) );
?>
                </span>

              </div>
            </div>
            <hr>
            <div>
              <h4 id='title' class='custom_blog_title_text' class='mt-3'><?php echo ucfirst( $blogPost[ 'blog_title' ] );
?></h4>
              <div class='custom_blog_text_description_box'>

                <?php echo nl2br( $blogPost[ 'blog_description' ] ) ;
?>

              </div>
            </div>
          </div>
        </div>
        <hr>
        <!-- Start of User Profiles and Biography section -->
        <h4 class='custom_blog_about_user_bio_text'>Get to know more about the author</h4>
        <div class='custom_user_bio_profile_container'>
          <div class='custom_user_bio_profile_content_box'>
            <div class='user_avatar_and_name_box'>
              <h5><?php echo $blogPost[ 'username' ] ?></h5>
              <h6><?php echo $blogPost[ 'email' ] ?></h6>
              <h6 style='color: brown;'>
                Login Status:
                <?php $user_role = $blogPost[ 'user_role' ];
if ( $user_role == 1 ) {
    echo 'Admin';
} else {
    echo 'Normal User';
}
?>
              </h6>
              <img class='img-profile rounded-circle' src="./admin/avatar/<?php echo $blogPost['avatar']; ?>"
                alt='user_avatar_img'>
            </div>
            <div class='user_bio_text_info_box'>
              <p>
                <?php echo strip_tags( substr( $blogPost[ 'user_bio' ], 0, 170 ) ) . '...';
?>
                <span><a href='profile.php?username=<?php echo htmlentities( $blogPost['user_id']); ?>'>Read
                    More</a></span>
              </p>
            </div>
          </div>
        </div>
        <!-- End of User Profiles and Biography section -->
        <hr>
        <!-- Disqus blog comment section -->
        <div id='disqus_thread'></div>
        <script>
        (function() {
          // DON'T EDIT BELOW THIS LINE
          var d = document,
            s = d.createElement('script');
          s.src = 'https://customs-blog.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>

        <!-- End of disqus comment section -->
      </div>
      <?php include './includes/sidebar.php';
?>
    </div>
  </div>

  <?php include './includes/footer.php';
    ?>