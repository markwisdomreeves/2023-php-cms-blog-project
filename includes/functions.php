<?php

function Redirect_To( $New_Location ) {
    header( 'Location: '.$New_Location );
    exit();
}

function ConfirmIfUserIsLoginOrNot() {
    if ( isset( $_SESSION[ 'user_data' ][ '1' ] ) ) {
        return true;
    } elseif ( isset( $_SESSION[ 'user_data' ][ '0' ] ) ) {
        return true;
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Login is required!';
        Redirect_To( 'http://markdev.live/login.php' );
    }
}

function TotalPosts() {

}

function TotalCategories() {

}

?>
