<?php session_start(); ?>
<?php include_once('lib.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('connect.php'); ?>

<?php if(!isActive()) 
{
    header("Location: home.php");
}

if(isset($_POST['prodID'])){  // add prod to $_SESSION['cart']
    $prodID = ($_POST['prodID']);
    //$sql = "SELECT * FROM Products WHERE prod_id = $prodID";

    if(isset($_SESSION['cart'][$prodID]))
        $_SESSION['cart'][$prodID]++; // add 1 more
    else 
        $_SESSION['cart'][$prodID] = 1; // add 1 to cart
}

if(!empty($_SESSION['cart'])) {
    $cartTotal = 0.0;
    echo "<form action='cart.php' method='POST'>\n";

    foreach($_SESSION['cart'] as $prodID => $qnty) {
        $sql = "SELECT * FROM Products WHERE prod_id = '$prodID'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)) {
                $subTotal = $qnty * $row['prod_price'];
                echo "Name: " . $row['prod_name'] . " SKU: ". $row['prod_sku'] . "<input type='number' name='$prodID' min='0'
                value='$qnty'> Subtotal: $" . $subTotal . "<br>\n";
                $cartTotal += $subTotal;
            }
        }
        $cartTotal += $row['prod_price'];
    }
    
    echo "Total : $".money_format('%.2n',$cartTotal)."<br>\n";
    echo "<input type='submit' value='Empty Cart' name='action'>\n";
    echo "<input type='submit' value='Update Cart' name='action'>\n";
    echo "</form>\n";
}
else {
    echo "The Cart is empty\n";
    echo "Go back to the <a href='store.php'>Store</a>\n";
}

if(isset($_POST['action']) && $_POST['action'] == 'Update Cart') {
    foreach($_POST as $key_prod_id => $qnty) {
        $qnty = htmlspecialchars($qnty);
        if(array_key_exists($key_prod_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$key_prod_id] = $qnty;
        }
        header("Location: cart.php");
        echo "Total: $" . $cartTotal;
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'Empty Cart') {
    unset($_SESSION['cart']);
    header("Location: cart.php");
}