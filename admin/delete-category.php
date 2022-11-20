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
if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $admin = $_SESSION[ 'user_data' ][ '2' ];
}
if ( $admin != 1 ) {
    Redirect_To( 'index.php' );
}
?>

<?php
if ( isset( $_GET[ 'category_id' ] ) ) {
    if ( $_SESSION[ 'user_data' ][ '1' ] ) {
        $GetCategoryParamId = $_GET[ 'category_id' ];
        $deleteCategory = "DELETE FROM categories WHERE cat_id = '$GetCategoryParamId'";
        $run = mysqli_query( $conn, $deleteCategory );
        if ( $run ) {
            $_SESSION[ 'SuccessMessage' ] = 'Category has been deleted successfully';
            Redirect_To( 'categories.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( 'categories.php' );
        }
    }
}
?>
