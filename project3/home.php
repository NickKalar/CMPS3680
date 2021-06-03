<?php ini_set('session.coookiehttponly',1); ?>
<?php session_start(); ?>
<?php include_once('lib.php'); ?>
<?php include('nav.php'); ?>

<?php  
    if(isActive()) {
        echo "<h1>Welcome " . $_SESSION['fname']. "</h1><br>\n";
        echo "Please select a test to take.\n";
    }
    else {
        echo "<h1>Welcome Guest</h1><br>\n";
        echo "<h3>You must log in to use this site.</h3><br>\n";;
    }
?>

</body>

