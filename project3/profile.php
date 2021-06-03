<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<?php
if(!isActive()) {
    header("Location: ./home.php");
    exit();
}
?>

<br>
<h2>Password Update</h2><br>
<form action='profile.php' method='POST'>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Current Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name="currentpword" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >New Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name="password1" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Confirm Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name="password2" placeholder="Password">
    </div>
  </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>

<?php
$err = "";
$currentpword = "";
$password1 = "";
$password2 = "";

if(isset($_POST['currentpword']) && isset($_POST['password1']) && 
   isset($_POST['password2'])) {
    
    $currentpword = dehack($_POST['currentpword']);
    $password1    = dehack($_POST['password1']);
    $password2    = dehack($_POST['password2']);

    if($currentpword == "" || $password1 == "" || $password2 == "") {
        $err .= "Password field empty";
    }
    elseif($password1 != $password2){
        $err .= "New Passwords don't match"; 
    }

    if($err != ""){
        echo $err;
        exit;
    }

    $user = $_SESSION['user'];

    $hashedNewPassword = password_hash($password1, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM Users WHERE user_email = '$user'";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
    if(password_verify($currentpword, $row['user_password'])){
        $sql = "UPDATE Users SET user_password = '$hashedNewPassword' WHERE user_email = '$user'";
        if($db->query($sql)){
            echo "Password Updated!";
        }
        else{
            echo "Password not updated.";
        }
    }
    else {
        echo "Old Password doesn't match";
        exit;
    }
}

?>

<?php include_once('footer.php') ?>