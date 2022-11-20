<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $userId = $_SESSION[ 'user_data' ][ '0' ];
}
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<?php
// Start of getting pagination from URL and fixing the issues
if ( !isset( $_GET[ 'page' ] ) ) {
    $page = 1;
} else {
    $page = $_GET[ 'page' ];
}
// Find Pagination Offset and set Limit in select query
$limit = 5;
$offset = ( $page-1 )*$limit;
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
      <!-- Page Heading -->
      <h5 class='mb-2 text-gray-800'>Blog Posts</h5>
      <?php
echo SuccessMessage();
echo ErrorMessage();
?>
      <!-- DataTales Example -->
      <div class='card shadow'>
        <div class='card-header py-3 d-flex justify-content-between'>
          <div class='custom_category_box'>
            <a href='add-blog-post.php'>
              <h6 class='font-weight-bold mt-2 u'>Add New Post</h6>
            </a>
          </div>
        </div>
        <div class='card-body'>
          <div class='table-responsive'>
            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th colspan='4'>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
$sql = "SELECT * FROM blogs LEFT JOIN categories ON blogs.category=categories.cat_id LEFT JOIN users ON blogs.author_id=users.user_id WHERE user_id='$userId' ORDER BY blogs.publish_date DESC limit $offset, $limit";
$query = mysqli_query( $conn, $sql );
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    while ( $result = mysqli_fetch_assoc( $query ) ) {
        ?>
                <tr>
                  <td><?php echo ++$offset;
        ?></td>
                  <td><?php echo htmlentities( substr( $result[ 'blog_title' ], 0, 10 ) ). '...';
        ?></td>

                  <td>
                    <img src="../uploads/<?php echo htmlentities($result[ 'blog_image' ]);
        ?>" class='img-fluid card-img-top' style='max-width: 40px;' />
                  </td>
                  <td><?php echo htmlentities( $result[ 'cat_name' ] );
        ?></td>
                  <td><?php echo htmlentities( $result[ 'username' ] );
        ?></td>
                  <td><?php echo htmlentities( date( 'd-M-Y', strtotime( $result[ 'publish_date' ] ) ) )
        ?></td>
                  <td>
                    <a href='../single-blog.php?id=<?php echo $result["blog_id"]; ?>'
                      class='btn btn-sm btn-success'>View</a>
                  </td>
                  <td>
                    <a href='edit-blog-post.php?id=<?php echo $result["blog_id"]; ?>'
                      class='btn btn-sm btn-info'>Edit</a>
                  </td>
                  <td>
                    <form action='delete-blog-post.php' method='POST'>
                      <input type='hidden' name='id' value="<?= $result['blog_id'];?>">
                      <input type='hidden' name='image' value="<?php echo $result['blog_image'];?>">
                      <input type='submit' name='deleteBlogPost' value='Delete' class='btn btn-sm btn-danger'>
                    </form>
                  </td>
                </tr>

                <?php
    }
} else {
    ?>
                <tr>
                  <td colspan='7'>
                    <h5>No Blog Post Found</h5>
                  </td>
                </tr>
                <?php
}
?>

              </tbody>
            </table>
            <!-- Adding pagination on admin blog posts table -->
            <?php
$pagination = "SELECT * FROM blogs WHERE author_id = '$userId'";
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
                <a href='blogs.php?page=<?php echo $i; ?>' class='page-link' style='color: #18151f;'>
                  <?php echo $i;
        ?>
                </a>
              </li>
              <?php }
        ?>
            </ul>
            <?php }
        ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include( './inc/adminFooter.php' );
        ?>