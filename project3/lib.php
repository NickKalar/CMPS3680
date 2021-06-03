<?php
session_start();

function isActive() {
    if(isset($_SESSION['active']) ){
        return($_SESSION['active']); // 
    }
    return(false);
}

function redirHome(){
    header("Location: home.php");
    exit();
}

function dehack($var){
    return trim(htmlentities($var));
}

?>
