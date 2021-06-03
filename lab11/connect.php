<?php 
//CONNECT_TO_DATABASE///////////////////////////////////
$server = 'localhost';
$user = 'nkalar';
$password = 'edwinblue';
$database = 'nkalar';
$db = new mysqli($server, $user, $password, $database);
// oop   $obj->member

if($db->connect_error) {
    exit("Bad Connection\n");
}
else {
    // DEVELOPMENT
    echo "We're connected<br>";
}
//GLOBAL_VAR $db////////////////////////////////////////
?>
