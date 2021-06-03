<?php 
$server = 'localhost';
$user = 'nkalar';
$password = 'edwinblue';
$database = 'nkalar';
$db = new mysqli($server, $user, $password, $database);

if($db->connect_error) {
    exit("Bad Connection\n");
}
else {
    // DEVELOPMENT
    // echo "We're connected<br>";
}
?>