<?php

function displayDateAndTime() 
{
    $dateTime = date('jS \of F\, Y \@ h:i:s A');
    return "$dateTime";
}

function dehack($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
  
    return $var;
}

$fibNum="";

if(isset($_POST['fibNum']) && !empty($_POST['fibNum']))
{
    $fibNum = dehack($_POST['fibNum1']);
    $fib1 = 0;
    $fib2 = 1;
    if(is_numeric($fibNum)) {
        if($fibNum < 1){
            $fibNum = "Please enter a positive number greater than 0.";
        } else if($fibNum == 1) {
            $fibNum = "That Fibonacci Number is " . 0;
        } else if($fibNum == 2) {
            $fibNum = "That Fibonacci Number is " . 1;
        } else {
            for($i = 2; $i < $fibNum; $i++)
            {
                $fib2 += $fib1;               // incraments to the next fibonacci number
                $fib1 = $fib2 - $fib1;        // brings fib1 to the number fib2 was
            }
            $fibNum = "That Fibonacci Number is " . $fib2;        
        }
    } else {
        $fibNum = "Please enter a number";
    }
} else 
{
    $fibNum = "Please enter a number";
}
