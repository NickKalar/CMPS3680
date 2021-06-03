<?php session_start(); ?>
<?php include_once('lib.php'); ?>

<?php
if(!isActive()) {
    header("Location: ./home.php");
    exit();
}

unset($_SESSION);
session_destroy();
$_SESSION = array();
?>

<?php require('nav.php'); ?>

<?php
    echo "User is logged out<br>\n";
    echo "<a href='./home.php'>Home</a>\n";
    echo "</body>\n";
    echo "</html>\n";
?>