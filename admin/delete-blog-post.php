<?php
include( '../includes/config.php' );
?>
<?php
include( '../includes/session.php' );
?>
<?php
include( '../includes/functions.php' );
?>

<?php
if ( isset( $_POST[ 'deleteBlogPost' ] ) ) {
    if ( $_SESSION[ 'user_data' ][ '1' ] ) {
        $GetBlogPostParamId = $_POST[ 'id' ];
        $GetBlogPostImageParam = '../uploads/'.$_POST[ 'image' ];
        $deleteBlogPost = "DELETE FROM blogs WHERE blog_id = '$GetBlogPostParamId'";
        $run = mysqli_query( $conn, $deleteBlogPost );
        if ( $run ) {
            unlink( $GetBlogPostImageParam );
            $_SESSION[ 'SuccessMessage' ] = 'Blog post has been deleted successfully';
            Redirect_To( '../admin/blogs.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( '../admin/blogs.php' );
        }
    }
}

?>
