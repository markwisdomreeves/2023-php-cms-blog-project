<?php include( './includes/config.php' );
?>

<?php include( './includes/session.php' );
?>

<?php include( './includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ][ '0' ] ) ) {
    Redirect_To( 'index.php' );
}
?>

<?php
if ( isset( $_POST[ 'login_btn' ] ) ) {
    $email = mysqli_real_escape_string( $conn, $_POST[ 'email' ] );
    $password =  mysqli_real_escape_string( $conn, sha1( $_POST[ 'password' ] ) );

    if ( empty( $email ) || empty( $password ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All fields are required';
        Redirect_To( 'login.php' );
    }

    $sql = "SELECT * FROM users WHERE email ='{$email}' AND password ='{$password}'";

    $query = mysqli_query( $conn, $sql );
    $data = mysqli_num_rows( $query );

    if ( $data > 0 ) {
        $result = mysqli_fetch_assoc( $query );
        $user_data = array( $result[ 'user_id' ], $result[ 'username' ], $result[ 'user_role' ], $result[ 'avatar' ] );

        if ( $result[ 'user_role' ] == 1 ) {
            $_SESSION[ 'user_data' ] = $user_data;
            $_SESSION[ 'SuccessMessage' ] = 'Welcome '.$_SESSION[ 'user_data' ][ '1' ].'!';
            if ( isset( $_SESSION[ 'TrackingURL' ] ) ) {
                Redirect_To( $_SESSION[ 'TrackingURL' ] );
            } else {
                Redirect_To( 'admin/index.php' );
            }
        } elseif ( $result[ 'user_role' ] == 0 ) {
            $_SESSION[ 'user_data' ] = $user_data;
            $_SESSION[ 'SuccessMessage' ] = 'Welcome '.$_SESSION[ 'user_data' ][ '1' ].'!';
            if ( isset( $_SESSION[ 'TrackingURL' ] ) ) {
                Redirect_To( $_SESSION[ 'TrackingURL' ] );
            } else {
                Redirect_To( 'admin/user_dashboard.php' );
            }
        }
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Invalid email / password.';
        Redirect_To( 'login.php' );
    }

}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Login page</title>
  <?php include( './includes/head.php' );
?>
</head>

<?php include( './includes/loginAndRegNavbar.php' );
?>

<!-- Start of main content section -->
<div class='container main_custom_login_page_container'>
  <div class='row'>
    <div class='col-xl-5 col-md-8 m-auto mt-5 p-5 bg-light'>
      <?php
echo SuccessMessage();
echo ErrorMessage();
?>
      <h2>Blog! Login your account.</h2>
      <form action='login.php' method='POST'>
        <div class='form-group mb-3'>
          <input type='text' name='email' class='form-control' placeholder='Enter email'>
        </div>
        <div class='form-group mb-3'>
          <input type='password' name='password' class='form-control' placeholder='Enter password'>
        </div>
        <div class='custom_login_box form-group mb-3'>
          <button class='btn' name='login_btn'>Login</button>
          <p>
            Do not have an account yet? <a href='register.php'>Register</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of main content section -->

<?php include( './includes/customFooter.php' );
?>