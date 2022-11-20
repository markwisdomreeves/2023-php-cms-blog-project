<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php $_SESSION[ 'TrackingURL' ] = $_SERVER[ 'PHP_SELF' ];
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $blogAuthorId = $_SESSION[ 'user_data' ][ '0' ];
}
$sql1 = 'SELECT * FROM categories';
$query1 = mysqli_query( $conn, $sql1 );
?>

<?php
if ( isset( $_POST[ 'add_blog_post_btn' ] ) ) {
    $BlogTitle = mysqli_real_escape_string( $conn, $_POST[ 'blogTitle' ] );
    $BlogDescription = mysqli_real_escape_string( $conn, $_POST[ 'blogDescription' ] );
    $BlogCategory = mysqli_real_escape_string( $conn, $_POST[ 'category' ] );
    $filename = $_FILES[ 'blog_image' ][ 'name' ];

    if ( empty( $BlogTitle ) || empty( $BlogDescription ) || empty( $BlogCategory ) || empty( $filename ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All input fields must be filled out';
        Redirect_To( 'add-blog-post.php' );
    } elseif ( strlen( $BlogTitle ) < 3 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Blog title can not be less than 3 chars';
        Redirect_To( 'add-blog-post.php' );
    } elseif ( strlen( $BlogTitle ) > 120 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Blog title can not be more than 120 chars';
        Redirect_To( 'add-blog-post.php' );
    } elseif ( strlen( $BlogDescription ) > 10000 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Blog description can not be greater than 10000 chars';
        Redirect_To( 'add-blog-post.php' );
    } elseif ( strlen( $BlogDescription ) < 500 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Blog description can not be less than 500 chars';
        Redirect_To( 'add-blog-post.php' );
    }
    $tmp_name = $_FILES[ 'blog_image' ][ 'tmp_name' ];
    $image_size = $_FILES[ 'blog_image' ][ 'size' ];
    $image_ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
    $allow_type = [ 'jpg', 'png', 'gif', 'jpeg' ];
    $destination = '../uploads/'.$filename;
    if ( in_array( $image_ext, $allow_type ) ) {
        if ( $image_size <= 2000000 ) {
            move_uploaded_file( $tmp_name, $destination );
            $sql2 = "INSERT INTO blogs (blog_title, blog_description, blog_image, category,author_id) VALUES ('$BlogTitle','$BlogDescription', '$filename','$BlogCategory', '$blogAuthorId')";
            $query2 = mysqli_query( $conn, $sql2 );
            if ( $query2 ) {
                $_SESSION[ 'SuccessMessage' ] = 'Blog post has been created successfully';
                Redirect_To( '../admin/blogs.php' );
            } else {
                $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
                Redirect_To( 'add-blog-post.php' );
            }
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Image size should not be greater than 2mb';
            Redirect_To( 'add-blog-post.php' );
        }
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Image type is not allowed (only jpg, jpeg, png and gif)';
        Redirect_To( 'add-blog-post.php' );
    }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Add New Blog Post</title>
  <?php include( './inc/adminHead.php' );
?>
</head>

<body id='page-top'>
  <!-- Page Wrapper -->
  <div id='wrapper'>
    <?php include( './inc/adminHeader.php' );
?>
    <!-- Begin Page Content -->
    <div class='container main_custom_add_blog_post_container'>
      <div class='row'>
        <div class='col-xxl-8 col-xl-8 col-md-10 col-sm-12 m-auto inner_main_custom_add_blog_post'>
          <?php
echo SuccessMessage();
echo ErrorMessage();
?>
          <h5 class='mb-3 text-gray-800'>Add New Blog Post</h5>
          <form action='add-blog-post.php' method='POST' enctype='multipart/form-data'>
            <div class='form-group mb-3'>
              <input type='text' name='blogTitle' id='blogTitle' class='form-control' placeholder='Add blog Title'>
            </div>
            <div class='form-group mb-3'>
              <h6 class='mb-1 text-gray-800'>Add blog description</h6>
              <textarea type='text' name='blogDescription' id='blogDescription' rows='10' class='form-control'
                placeholder='Add blog description'></textarea>
            </div>
            <div class='form-group mb-3'>
              <select class='form-control' name='category' id='category'>
                <option value='' selected hidden disabled>Select Category</option>
                <?php while ( $cats = mysqli_fetch_assoc( $query1 ) ) {
    ?>
                <option value='<?php echo $cats["cat_id"]; ?>'>
                  <?php echo $cats[ 'cat_name' ];
    ?>
                </option>
                <?php }
    ?>
              </select>
            </div>
            <div class='form-group'>
              <label for='blog_image'>Image</label>
              <input type='file' accept='image/*' class='form-control' name='blog_image' id='blog_image'>
            </div>
            <div class='custom_add_blog_post_box form-group mb-2'>
              <button type='submit' class='btn mt-3' name='add_blog_post_btn'>Add New Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <?php include( './inc/adminFooter.php' );
    ?>