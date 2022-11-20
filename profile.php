<?php include( './includes/config.php' );
?>

<?php include( './includes/session.php' );
?>

<?php include( './includes/functions.php' );
?>

<?php
$SearchQueryParams = $_GET[ 'username' ];

$sql1 = "SELECT * FROM users WHERE user_id='$SearchQueryParams'";
$result1 = mysqli_query( $conn, $sql1 );
$UserInfo = mysqli_fetch_assoc( $result1 );

$sql2 = "SELECT * FROM blogs LEFT JOIN categories ON blogs.category=categories.cat_id LEFT JOIN users ON blogs.author_id=users.user_id WHERE author_id = '$SearchQueryParams' ORDER BY blogs.publish_date DESC limit 5";
$result2 = mysqli_query( $conn, $sql2 );
$run = mysqli_num_rows( $result2 );
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>User Profile</title>
<?php include( './includes/head.php' );
?>
</head>

<?php include( './includes/header.php' );
?>

<body>
<div class = 'main_custom_user_profile_container'>
<header></header>
<div class = 'inner_main_custom_user_profile_container'>
<div class = 'left_custom_user_profile_box'>
<div class = 'left_custom_user_profile_img_box'>
<img src = "./admin/avatar/<?php echo htmlentities($UserInfo['avatar']); ?>" alt = 'user_avatar_img'>
</div>
<div class = 'left_custom_user_profile_text_content_box'>
<h2><?php echo htmlentities( $UserInfo[ 'username' ] );
?></h2>
<h6><?php echo htmlentities( $UserInfo[ 'job_title' ] );
?></h6>
<h6><?php echo htmlentities( $UserInfo[ 'email' ] );
?></h6>
<h5>
Login Status:
<?php $user_role = $UserInfo[ 'user_role' ];
if ( $user_role == 1 ) {
    echo 'Admin User';
} else {
    echo 'Normal User';
}
?>
</h5>
<hr>
<p>
<?php echo nl2br( $UserInfo[ 'user_bio' ] );
?>
</p>
</div>
</div>

<!-- Displaying some Related Articles Written by Authors -->
<div class = 'right_custom_user_profile_box'>
<?php
if ( $run ) {
    while ( $UserArticles = mysqli_fetch_assoc( $result2 ) ) {
        ?>
        <div class = 'right_custom_user_profile_related_articles_box'>
        <div class = 'custom_user_profile_related_articles_items'>
        <a href = 'single-blog.php?id=<?php echo $UserArticles[ 'blog_id' ]; ?>'>
        <img src = "./uploads/<?php echo htmlentities($UserArticles[ 'blog_image' ]); ?>"
        alt = 'Blog Article Image' />
        </a>
        </div>
        </div>
        <?php }

    } else {
        ?>
        <div class = 'no_blog_item_display_message_box'>
        <h6 style = 'padding: 10px;'><?php echo $UserInfo[ 'username' ];
        ?>
        No Blog Article Found
        </h6>
        </div>
        <?php
    }
    ?>
    </div>
    </div>
    </div>

    <?php include ( './includes/userProfileFooter.php' ) ?>
