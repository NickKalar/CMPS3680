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

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Results WHERE user_id = $user_id";

if($res = $db->query($sql)){
    ?>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Test Name</th>
            <th>Score</th>
            <th>Taken</th>
        </tr>
    </thead>
    <tbody>

    <?php

    while($row = mysqli_fetch_assoc($res)){
        $test_id = $row['test_id'];
        $sql = "SELECT * FROM Tests WHERE test_id = $test_id";
        $test = mysqli_fetch_assoc($db->query($sql));
        $time = strtotime($row['time_stamp']);
        $time_stamp = date("m/d/y g:i A", $time);
        
        echo "<tr>\n";
            echo "<td>" . $test['test_name'] . "</td>\n";
            echo "<td>" . $row['score'] . "</td>\n";
            echo "<td>" . $time_stamp . "</td>\n";
        echo "</tr>\n";
    }
    

        echo "</tbody>\n";
    echo "</table>\n";

}
?>

<?php include_once('footer.php'); ?>