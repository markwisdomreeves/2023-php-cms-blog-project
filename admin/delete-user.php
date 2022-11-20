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
if ( isset( $_GET[ 'id' ] ) ) {
    if ( $_SESSION[ 'user_data' ][ '1' ] ) {
        $GetUserParamId = $_GET[ 'id' ];
        $deleteUser = "DELETE FROM users WHERE user_id = '$GetUserParamId'";
        $run = mysqli_query( $conn, $deleteUser );
        if ( $run ) {
            $_SESSION[ 'SuccessMessage' ] = 'User has been deleted successfully';
            Redirect_To( 'users.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Failed, please try again';
            Redirect_To( 'users.php' );
        }
    }
}
?>
