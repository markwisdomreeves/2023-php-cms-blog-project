<?php include( './includes/config.php' );
?>

<?php include( './includes/session.php' );
?>

<?php include( './includes/functions.php' );
?>

<?php
$keyword = $_GET[ 'keyword' ];
if ( empty( $keyword ) ) {
    Redirect_To( 'index.php' );
}
?>

<?php
// Start of getting pagination from URL and fixing the issues
if ( !isset( $_GET[ 'page' ] ) ) {
    $page = 1;
} else {
    $page = $_GET[ 'page' ];
}
// Find Pagination Offset and set Limit in select query
$limit = 4;
$offset = ( $page-1 )*$limit;
?>

<?php
// End of getting pagination from URL and fixing the issues
$sql = "SELECT * FROM blogs LEFT JOIN categories ON blogs.category=categories.cat_id LEFT JOIN users ON blogs.author_id=users.user_id WHERE blog_title like '%$keyword%' OR blog_description like '%$keyword%' ORDER BY blogs.publish_date DESC limit $offset, $limit";
$run = mysqli_query( $conn, $sql );
$row = mysqli_num_rows( $run );
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Home page</title>
  <?php include( './includes/head.php' );
?>
</head>

<?php include( './includes/header.php' );
?>

<body>
  <div class='container custom_margin_top_box'>
    <div class='row'>
      <div class='search_results_text'>Search Result for:
        <h4 style='color: brown;'><?php echo $keyword;
?></h4>
      </div>
      <div class='col-lg-8'>
        <hr>
        <?php
if ( $row ) {
    while ( $result = mysqli_fetch_assoc( $run ) ) {
        ?>
        <article class='blog_article_item_box'>
          <a href='single-blog.php?id=<?php echo $result[ 'blog_id' ]; ?>'>
            <img src="./uploads/<?php echo htmlentities($result[ 'blog_image' ]); ?>" style="height:100%; width:100%;
" class='img-fluid' alt='Blog Article Img' />
          </a>
          <div class='blog_article_text_content_box'>
            <a href='single-blog.php?id=<?php echo $result[ 'blog_id' ]; ?>'>
              <h1>
                <?php echo htmlentities( ucfirst( $result[ 'blog_title' ] ) );
        ?>
              </h1>
            </a>
            <li>
              <i class='fa fa-calendar-o' aria-hidden='true'>
                <?php $date = $result[ 'publish_date' ];
        ?>
              </i>
              <?php echo date( 'd-M-Y', strtotime( $date ) );
        ?>
            </li>
            <div class='text_description_box'>
              <?php echo strip_tags( substr( $result[ 'blog_description' ], 0, 200 ) ) . '...';
        ?>
            </div>
            <div class='basic_links_items_box'>
              <li>
                <a href='profile.php?username=<?php echo htmlentities( $result['user_id']); ?>'
                  class='custom_index_category_img'>
                  <img class='img-profile rounded-circle custom_user_avatar_img'
                    src="./admin/avatar/<?php echo htmlentities($result['avatar']); ?>" alt='user_avatar_img'>
                  <?php

        $user_role = $result[ 'user_role' ];

        if ( $user_role == 1 ) {
            $Admin = 'Admin';
            echo $result[ 'username' ].' '. "<span>($Admin)</span>";
        } else {
            $Co_Admin = 'User';
            echo $result[ 'username' ].' '. "<span>($Co_Admin)</span>";
        }
        ?>
                </a>
              </li>
              <li>
                <a href='category.php?id=<?php echo $result['cat_id'];?>' class='custom_category_button'>
                  Category:
                  <?php echo ( $result[ 'cat_name' ] );
        ?>
                  </i>

                </a>
              </li>
              <li class='custom_read_more_btn'>
                <a href='single-blog.php?id=<?php echo $result[ 'blog_id' ]; ?>' class='custom_read_more_btn'>
                  Read More
                </a>
              </li>
            </div>
          </div>
        </article>
        <?php }
    } else {
        ?>
        <div class='no_blog_item_display_message_box'>
          <h2>Not Found!</h2>
        </div>
        <?php
    }
    ?>
        <!-- Start of Pagination section -->
        <?php
    $pagination = "SELECT * FROM blogs WHERE blog_title like '%$keyword%' OR blog_description like '%$keyword%'";
    $run_query = mysqli_query( $conn, $pagination );
    $total_num_of_posts = mysqli_num_rows( $run_query );
    $pages = ceil( $total_num_of_posts/$limit );

    // Start of showing pagination btn allowing to the number of posts
    if ( $total_num_of_posts > $limit ) {
        ?>
        <ul class='pagination pt-2 pb-5'>
          <?php for ( $i = 1; $i <= $pages; $i++ ) {
            ?>
          <li class='page-item'>
            <a href='search.php?keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>' class='page-link'
              style='color: #18151f;'>
              <?php echo $i;
            ?>
            </a>
          </li>
          <?php }
            ?>
        </ul>
        <?php }
            ?>
        <!-- End of Pagination section -->
      </div>
      <?php include './includes/sidebar.php';
            ?>
    </div>
  </div>

  <?php include './includes/footer.php';
            ?>