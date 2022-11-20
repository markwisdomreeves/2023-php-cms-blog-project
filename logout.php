<?php include( '../includes/config.php' );
?>

<?php
session_start();
session_unset();
session_destroy();
header( 'Location: http://markdev.live/login.php' );
exit();
?>
