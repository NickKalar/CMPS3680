<?php ini_set('session.coookiehttponly',1); ?>
<?php session_start(); ?>
<?php include_once('lib.php'); ?>
<?php include('nav.php'); ?>

<?php  
    if(isActive()) {
        echo "<h1>Welcome " . $_SESSION['user']. "</h1><br>\n";
        echo "<a href='logout.php'>LOGOUT</a>\n";
    }
    else {
        echo "<h1>Welcome Guest</h1><br>\n";
        echo "<h1>You must log in to view the store.</h1><br>\n";
        echo "<a href='login.php'>LOGIN</a>\n";
    }
?>

</body>

