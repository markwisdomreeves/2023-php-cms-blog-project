<?php include( '../includes/config.php' );
?>

<?php include( '../includes/session.php' );
?>

<?php include( '../includes/functions.php' );
?>

<?php

if ( isset( $_SESSION[ 'user_data' ] ) ) {
    $UserId = $_SESSION[ 'user_data' ][ '0' ];
}

?>

<?php
ConfirmIfUserIsLoginOrNot();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <title>User Lists Page</title>
  <?php include( '../admin/inc/adminHead.php' );
?>
</head>

<body id='page-top'>
  <!-- Page Wrapper -->
  <div id='wrapper'>
    <?php include( '../admin/inc/adminHeader.php' );
?>
    <!-- Begin Page Content -->
    <div class='container-fluid custom_category_container'>
      <!-- Page Heading -->
      <div class='custom_user_dashboard_text_info_box'>
        <h5 class='mb-2 mb-4 text-gray-800' style='font-size: 1.7rem;'>My Account</h5>
        <h6 class='mb-2 mb-2 text-center' style='font-size: 1rem; color: brown;'>Please note that by
          clicking on the
          red delete
          button
          below, your account will
          automatically be deleted from the system and you will be logout!</h6>
      </div>
      <?php
echo SuccessMessage();
echo ErrorMessage();
?>
      <!-- DataTales Example -->
      <div class='card shadow'>
        <div class='card-body'>
          <div class='table-responsive custom_admin_table_container'>
            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Avatar</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th colspan='2'>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
$sql = "SELECT * FROM users WHERE user_id = '$UserId' ORDER BY username DESC";
$query = mysqli_query( $conn, $sql );
$SrNo = 0;
$rows = mysqli_num_rows( $query );
if ( $rows ) {
    while ( $row = mysqli_fetch_assoc( $query ) ) {
        ?>
                <tr>
                  <td>
                    <?php echo ++$SrNo;
        ?>
                  </td>
                  <td>
                    <img src="../admin/avatar/<?php echo htmlentities($row[ 'avatar' ]);
        ?>" class='img-fluid card-img-top' style='max-width: 40px;' />
                  </td>
                  <td>
                    <?php echo $row[ 'username' ];
        ?>
                  </td>
                  <td>
                    <?php echo $row[ 'email' ];
        ?>
                  </td>
                  <td>
                    <?php $user_role = $row[ 'user_role' ];
        if ( $user_role == 0 ) {
            echo 'Co-Admin';
        }
        ?>
                  </td>
                  <td>
                    <a href='delete-user.php?id=<?php echo $row[ 'user_id'];?>' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>

                <?php

    }
} else {
    ?>
                <tr>
                  <td colspan='4'>
                    <h5>No User Record Found</h5>
                  </td>
                </tr>
                <?php
}
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include( '../admin/inc/customProfileFooter.php' );
?>