<?php

$error = "";
$output;
$fnameError;
$lnameError;
$drinkError;
$sizeError;
$locationError;

if(isset($_POST['fname']) && !empty($_POST['fname'])){
  $fname = dehack($_POST['fname']);
} else {
  $error = $error . "First Name Required <br>";
  $fnameError = "*";
}

if(isset($_POST['lname']) && !empty($_POST['lname'])){
  $lname = dehack($_POST['lname']);
} else {
  $error = $error . "Last Name Required <br>";
  $lnameError = "*";
}

if(isset($_POST['drink']) && !empty($_POST['drink'])){
  $drink = dehack($_POST['drink']);
} else {
  $error = $error . "Drink Type Required <br>";
  $drinkError = "*";
}

if(isset($_POST['size']) && !empty($_POST['size'])){
  $temp = dehack($_POST['size']);
  $arr = explode('$', $temp);
  
  $size = $arr[0];
  $price = $arr[1];
} else {
  $error = $error . "Size Required <br>";
  $sizeError = "*";
}

if(isset($_POST['radio']) && !empty($_POST['radio'])){
  $loc = dehack($_POST['radio']);
} else {
  $error = $error . "For Here or To Go Required <br>";
  $locationError = "*";
}

function dehack($var) {
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);

  return $var;
}

?>

<html lang="en">

<head>
  <title>BlarBlucks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
      .error {color: red;}
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4">
        <h1>BlarBlucks Coffee</h1>
        <br>
        <form name ="coffeeOrder" action="lab4.php" method="post" >
          First Name: <input type="text" name="fname"> <span class='error'><?php echo $fnameError ?></span>
          <br>
          Last Name: <input type="text" name="lname"> <span class='error'><?php echo $lnameError ?></span>
          <br>
          <hr>
          <h4>Drink Style<span class='error'><?php echo $drinkError ?></span></h4> 
          <input type="checkbox" name="drink" value="latte"> Latte<br>
          <input type="checkbox" name="drink" value="mocha"> Mocha<br>
          <input type="checkbox" name="drink" value="cappuccino"> Cappuccino<br>
          <input type="checkbox" name="drink" value="americano"> Americano
          <br>
          <hr>
          <h4>Size<span class='error'><?php echo $sizeError ?></span></h4> 
          <input type="checkbox" name="size" value="hoch$1.99">Hoch - $1.99<br>
          <input type="checkbox" name="size" value="groß$2.79">Groß - $2.79<br>
          <input type="checkbox" name="size" value="zwanzig$3.11">Zwanzig - $3.11
          <br>
          <hr>
          <h4 id="place">For Here or To Go?<span class='error'><?php echo $locationError ?></span></h4> 
          <input type="radio" name="radio" value="in house"> In House<br>
          <input type="radio" name="radio" value="to go"> To Go
          <br>
          <hr>
          <input type="submit" value="Add to Cart">
        </form>
      </div>
      <div class="col-2">
        <span>
          <?php 
            if($error == ""){
              echo "Thank you " . $fname . " " . $lname . "<br>Your " . $size . " " . $drink . " is $" . $price . " and will be ready for " . $loc;
            } else {
              echo $error;
            }
          ?>
        </span>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>