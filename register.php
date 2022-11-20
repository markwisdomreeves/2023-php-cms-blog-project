<?php include( './includes/config.php' );
?>

<?php include( './includes/session.php' );
?>

<?php include( './includes/functions.php' );
?>

<?php
if ( isset( $_SESSION[ 'user_data' ][ '0' ] ) ) {
    Redirect_To( 'admin/index.php' );
}
?>

<?php
if ( isset( $_POST[ 'register_btn' ] ) ) {
    $username = mysqli_real_escape_string( $conn, $_POST[ 'username' ] );
    $email = mysqli_real_escape_string( $conn, $_POST[ 'email' ] );
    $password =  mysqli_real_escape_string( $conn, sha1( $_POST[ 'password' ] ) );
    $confirmPassword =  mysqli_real_escape_string( $conn, sha1( $_POST[ 'confirmPassword' ] ) );
    $avatar = $_FILES[ 'avatar' ][ 'name' ];

    if ( empty( $username ) || empty( $email ) || empty( $avatar ) || empty( $password ) || empty( $confirmPassword ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All fields are required';
        Redirect_To( 'register.php' );
    } elseif ( strlen( $username ) < 3 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Username must be at least 3 characters long';
        Redirect_To( 'register.php' );
    } elseif ( strlen( $password ) < 5 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Password must be at least 5 characters long';
        Redirect_To( 'register.php' );
    }
    $tmp_name = $_FILES[ 'avatar' ][ 'tmp_name' ];
    $image_ext = strtolower( pathinfo( $avatar, PATHINFO_EXTENSION ) );
    $allow_type = [ 'jpg', 'png', 'gif', 'jpeg' ];
    $destination = './admin/avatar/'.$avatar;
    if ( in_array( $image_ext, $allow_type ) ) {
        move_uploaded_file( $tmp_name, $destination );
        $sql1 = "SELECT * FROM users WHERE email ='{$email}' AND password ='{$password}'";
        $result1 = mysqli_query( $conn, $sql1 );
        $final_result = mysqli_num_rows( $result1 );
        if ( $final_result >= 1 ) {
            $_SESSION[ 'ErrorMessage' ] = 'Email address already exists our database!';
            Redirect_To( 'register.php' );
        } else {
            if ( $password === $confirmPassword ) {
                $sql2 = "INSERT INTO users (username, email, password, avatar) VALUES ('{$username}', '{$email}', '{$password}', '{$avatar}')";
                $result2 = mysqli_query( $conn, $sql2 );
                if ( $result2 ) {
                    $_SESSION[ 'SuccessMessage' ] = 'Account created successfully. Please login!';
                    Redirect_To( 'login.php' );
                } else {
                    $_SESSION[ 'ErrorMessage' ] = 'We encountered an error: '.$sql2.mysqli_error( $conn ).'';
                    Redirect_To( 'register.php' );
                }
            } else {
                $_SESSION[ 'ErrorMessage' ] = 'Both passwords do not matched!';
                Redirect_To( 'register.php' );
            }
        }
    } else {
        $_SESSION[ 'ErrorMessage' ] = 'Image type is not allowed (only jpg, jpeg, png and gif)';
        Redirect_To( 'register.php' );
    }
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>Register page</title>
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
      <h2>Register a new account.</h2>
      <form action='register.php' method='POST' enctype='multipart/form-data'>
        <div class='form-group mb-3'>
          <input type='text' name='username' class='form-control' placeholder='Enter username'>
        </div>
        <div class='form-group mb-3'>
          <input type='text' name='email' class='form-control' placeholder='Enter email'>
        </div>
        <div class='form-group mb-3'>
          <input type='password' name='password' class='form-control' placeholder='Enter password'>
        </div>
        <div class='form-group mb-3'>
          <input type='password' name='confirmPassword' class='form-control' placeholder='Enter confirm password'>
        </div>
        <div class='form-group mb-3'>
          <label for='avatar'>User Avatar</label>
          <input type='file' accept='image/*' class='form-control' name='avatar' id='avatar'>
        </div>
        <div class='custom_login_box form-group mb-3'>
          <button class='btn' name='register_btn'>Register</button>
          <p>
            Already have an account? <a href='login.php'>Login</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of main content section -->

<?php include( './includes/customFooter.php' );
?>