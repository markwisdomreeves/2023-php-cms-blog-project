<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $blogAuthorId = $_SESSION[ 'user_data' ][ '0' ];
}

// Blog param id
$blogParamId = $_GET[ 'id' ];

if ( empty( $blogParamId ) ) {
    Redirect_To( 'index.php' );
}

// fetch categories
$sql1 = 'SELECT * FROM categories';
$query1 = mysqli_query( $conn, $sql1 );

// Fetch existing blog post
$sql2 = "SELECT * FROM blogs LEFT JOIN categories ON blogs.category=categories.cat_id LEFT JOIN users ON blogs.author_id=users.user_id WHERE blog_id='$blogParamId'";
$query2 = mysqli_query( $conn, $sql2 );
$result = mysqli_fetch_assoc( $query2 );
?>

<!-- Update blog post -->
<?php
if ( isset( $_POST[ 'update_blog_post_btn' ] ) ) {
    $BlogTitle = mysqli_real_escape_string( $conn, $_POST[ 'blogTitle' ] );
    $BlogDescription = mysqli_real_escape_string( $conn, $_POST[ 'blogDescription' ] );
    $BlogCategory = mysqli_real_escape_string( $conn, $_POST[ 'category' ] );
    $filename = $_FILES[ 'blog_image' ][ 'name' ];
    $tmp_name = $_FILES[ 'blog_image' ][ 'tmp_name' ];
    $image_size = $_FILES[ 'blog_image' ][ 'size' ];
    $image_ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
    $allow_type = [ 'jpg', 'png', 'gif', 'jpeg' ];
    $destination = '../uploads/'.$filename;

    if ( !empty( $filename ) ) {
        if ( in_array( $image_ext, $allow_type ) ) {
            if ( $image_size <= 2000000 ) {
                $unlink = '../uploads/'.$result[ 'blog_image' ];
                unlink( $unlink );
                move_uploaded_file( $tmp_name, $destination );
                $sql3 = "UPDATE blogs SET blog_title='$BlogTitle', blog_description='$BlogDescription', category='$BlogCategory', blog_image='$filename', author_id='$blogAuthorId' WHERE blog_id='$blogParamId'";
                $query3 = mysqli_query( $conn, $sql3 );
                if ( $query3 ) {
                    $_SESSION[ 'SuccessMessage' ] = 'Blog post has been updated successfully';
                    Redirect_To( 'blogs.php' );
                } else {
                    $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
                    Redirect_To( 'edit-blog-post.php' );
                }
            } else {
                $_SESSION[ 'ErrorMessage' ] = 'Image size should not be greater than 2mb';
                Redirect_To( 'edit-blog-post.php' );
            }
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Image type is not allowed (only jpg, jpeg, png and gif)';
            Redirect_To( 'edit-blog-post.php' );
        }
    } else {
        $sql3 = "UPDATE blogs SET blog_title='$BlogTitle', blog_description='$BlogDescription', category='$BlogCategory', author_id='$blogAuthorId' WHERE blog_id='$blogParamId'";
        $query3 = mysqli_query( $conn, $sql3 );
        if ( $query3 ) {
            $_SESSION[ 'SuccessMessage' ] = 'Blog post has been updated successfully';
            Redirect_To( 'blogs.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( 'edit-blog-post.php' );
        }
    }
}
?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Edit Blog Post</title>
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

          <h5 class='mb-3 text-gray-800'>Edit Blog Post</h5>
          <form action='' method='POST' enctype='multipart/form-data'>
            <div class='form-group mb-3'>
              <input type='text' name='blogSlug' id='blogSlug' class='form-control'
                placeholder='Add url slug for blog post'>
            </div>
            <div class='form-group mb-3'>
              <input type='text' name='blogTitle' id='blogTitle' class='form-control' placeholder='Add blog Title'
                value="<?php echo $result['blog_title'] ?>" required>
            </div>
            <div class='form-group mb-3'>
              <h6 class='mb-1 text-gray-800'>Add blog description</h6>
              <textarea type='text' name='blogDescription' id='blogDescription' rows='5' class='form-control'
                placeholder='Add blog description' required>
<?php echo $result[ 'blog_description' ] ?>
</textarea>
            </div>
            <div class='form-group mb-3'>
              <h6 style='font-weight: 600; color: black;'>
                Existing Category:
                <span
                  style='font-size: 20px; margin-right: 10px; color: maroon;'><?php echo $result[ 'cat_name' ] ?></span>
              </h6>
              <select class='form-control' name='category' id='category' required>
                <option value='' selected hidden disabled>Update Category</option>
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
              <h6 class='mt-2'>Existing image</h6>
              <img src="../uploads/<?php echo $result['blog_image']; ?>" class='img-fluid card-img-top'
                style='max-width: 80px;' alt='blog-img'>
            </div>
            <div class='custom_add_blog_post_box form-group mb-2'>
              <button type='submit' class='btn mt-3' name='update_blog_post_btn'>Update Blog Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <?php include( './inc/adminFooter.php' );
    ?>