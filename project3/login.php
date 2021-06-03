<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<br>
<form action='login.php' method='POST'>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail3" name="user" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
    </div>
  </div>
    <button class="btn btn-primary" type="submit">Login</button>
</form>

<?php
if(isset($_POST['user']) && isset($_POST['password'])) {
    // validation
    if(!empty($_POST['user']))
        $store_user = dehack($_POST['user']);
    if(!empty($_POST['password']))
        $store_password = dehack($_POST['password']);
    
    $sql = "SELECT * FROM Users WHERE user_email = '$store_user'";
    $res = $db->query($sql);

    if ($res->num_rows > 0){
        $row = $res->fetch_assoc();
        if (password_verify($store_password, $row['user_password'])){
            // SUCCESS
            $_SESSION['active'] = true;
            $_SESSION['user'] = $store_user;
            $_SESSION['fname'] = $row['user_fname'];
            $_SESSION['lname'] = $row['user_lname'];
            $_SESSION['user_id'] = $row['user_id'];

            session_regenerate_id(true);

            redirHome();
            
            exit();
        } 
        else {
            // invalid PASSWORD
            echo "Invalid Credentials.\n";
        }
    }
    else {
        // invalid EMAIL
        echo "Invalid Credentials.\n";
    }
}
?>

<?php include_once('footer.php') ?>