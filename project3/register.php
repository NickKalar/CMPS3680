<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<?php
if(isActive()) {
    header("Location: ./home.php");
    exit();
}
?>

<br>
<form action='register.php' method='POST'>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputEmail3" name='fname'>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputEmail3" name='lname'>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail3" name='email'>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name='password1'>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Confirm Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name='password2'>
    </div>
  </div>
    <button class="btn btn-primary" type="submit">Register Now</button>
</form>

<?php

$fname     = '';
$lname     = '';
$email     = '';
$password1 = '';
$password2 = '';
$err       = '';

if(isset($_POST['fname']) && isset($_POST['lname']) && 
   isset($_POST['email']) && isset($_POST['password1']) && 
   isset($_POST['password2'])) {
    $fname = dehack($_POST['fname']);
    $lname = dehack($_POST['lname']);
    $email = dehack($_POST['email']);
    $password1 = dehack($_POST['password1']);
    $password2 = dehack($_POST['password2']);

    if($fname == ''){ $err .= "First name empty<br>"; }

    if($lname == ''){ $err .= "Last name empty<br>"; }

    if($email == ''){ $err .= "Email empty empty<br>"; }

    if($password1 == '' || $password2 == ''){ $err .= "Password field empty<br>"; }

    if($password1 != $password2){ $err .= "Passwords don't match.<br>"; }

    if($err != ''){
        echo $err;
        exit;
    }

    $sql = "SELECT user_id FROM Users WHERE user_email='$email'";
    if($res = $db->query($sql)) {
        if($res->num_rows != 0){
            echo "email alread in use<br>";
        }
        else {
            $hashedpassword = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO Users (user_fname, user_lname, user_email, user_password) 
                    VALUES ('{$fname}', '{$lname}', '{$email}', '{$hashedpassword}')"; 
            if($db->query($sql)) { // LIVE
                header("Location: login.php"); 
                exit;
            }
            else {
                // query failed 
                echo "What did you do?";
                exit;
            }
        }
    }
}

?>

<?php include_once('footer.php') ?>