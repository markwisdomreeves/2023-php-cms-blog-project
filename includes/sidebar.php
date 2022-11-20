<?php include ( './includes/config.php' );
?>

<!-- Fetch categories -->
<?php
$select1 = 'SELECT * FROM categories';
$query1 = mysqli_query( $conn, $select1 );
$result1 = mysqli_num_rows( $query1 );
?>

<!-- Fetch recent blog post -->
<?php
$select2 = 'SELECT * FROM blogs ORDER BY publish_date DESC LIMIT 5';
$query2 = mysqli_query( $conn, $select2 );
$result2 = mysqli_num_rows( $query2 );
?>

<div class='col-lg-4 main_blog_and_category_sidebar_container'>
  <div class='card'>
    <div class='card-body d-flex right-section blog_and_category_sidebar_container'>
      <div id='categories'>
        <h6>Categories</h6>
        <ul>
          <?php

if ( $result1 ) {
    while ( $cats = mysqli_fetch_assoc( $query1 ) ) {
        ?>
          <li>
            <a href="category.php?id=<?= $cats['cat_id']; ?>">
              <?php echo $cats[ 'cat_name' ];
        ?>
            </a>
          </li>
          <?php
    }
} else {
    ?>
          <h4 class='no_post_found_message'>Article Category Not Found!</h4>
          <?php
}
?>
        </ul>
      </div>
      <div id='posts'>
        <h6>Recent Articles</h6>
        <div class='main_custom_recent_article_container'>
          <?php
if ( $result2 ) {
    while ( $blogs = mysqli_fetch_assoc( $query2 ) ) {
        ?>
          <a href="single-blog.php?id=<?= $blogs['blog_id']; ?>">
            <div class='custom_recent_article_box'>
              <a href="single-blog.php?id=<?= $blogs['blog_id']; ?>">
                <img src="uploads/<?php echo $blogs['blog_image'];?>" alt='recent_blog_image' />
              </a>
              <div class='custom_recent_article_text_box'>
                <a href="single-blog.php?id=<?= $blogs['blog_id']; ?>">
                  <h4> <?php echo $blogs[ 'blog_title' ];
        ?></h4>
                  <h5>
                    <?php $date = $blogs[ 'publish_date' ];
        ?>
                    <?php echo $date;
        ?>
                  </h5>
              </div>
            </div>
          </a>
          <hr>
          <?php
    }
} else {
    ?>
          <h4 class='no_post_found_message'>Recent Article Not Found!</h4>
          <?php
}
?>
        </div>
      </div>
    </div>
  </div>
</div>