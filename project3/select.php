<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>

<?php
if(!isActive()) {
    header("Location: ./home.php");
    exit();
}
?>

<?php

$sql = "SELECT * FROM Tests";
if($res = $db->query($sql)){
    while($row = mysqli_fetch_assoc($res)) {
        $test_id = $row['test_id'];
        $test_name = $row['test_name'];
        echo "<br><a href='./test.php?q=".$test_id."'>".$test_name."</a><br><hr>\n";
    }
}

?>

<?php include_once('footer.php'); ?>
