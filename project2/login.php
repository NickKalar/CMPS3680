<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<?php
if(isset($_POST['user']) && isset($_POST['password'])) {
    // validation
    if(!empty($_POST['user']))
        $store_user = trim(htmlspecialchars($_POST['user']));
    if(!empty($_POST['password']))
        $store_password = trim(htmlspecialchars($_POST['password']));

    
    $sql = "SELECT * FROM Users WHERE user_email = '$store_user'";
    $res = $db->query($sql);

    if ($res->num_rows > 0){
        $row = $res->fetch_assoc();
        if ($row['user_password'] == $store_password){
            // SUCCESS
            $_SESSION['active'] = true;
            $_SESSION['user'] = $store_user;

            session_regenerate_id(true);

            redirHome();
            
            exit();
        } 
        else {
            // invalid PASSWORD
            echo "Invalid Password.\n" . $store_password . " " . $row['user_password'];
        }
    }
    else {
        // invalid EMAIL
        echo "Invalid User Email.\n" . $store_user;
    }
}
else {
    echo "Please Log In.\n";
}
?>

<form action='login.php' method='post'>
    <label>Email Address: <input type = 'text'  name='user'></label>
    <label>Password: <input type = 'password' name='password'></label>
    <input type='submit' value='Login'>
</form>
</body>
</html>