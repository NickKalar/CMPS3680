<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<?php
define("IMG_DIR", "images/");

if(!isActive()) redirHome();

if(isset($_GET['q'])) { // DISPLAY 1 ITEM
    $prodID = htmlspecialchars($_GET['q']);
    $sql = "SELECT * FROM Products WHERE prod_id = '$prodID'";
    $result = mysqli_query($db, $sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='item-container'>\n";
            echo "  <div class='img-container'>\n";
            echo "<img src='" . IMG_DIR . $row["prod_img"] . "' >";
            echo "  </div>\n";
            echo "  <div class='detail-container'>\n";
            echo "<BR>Name: " . $row["prod_name"] . "<br>\n";
            if($row["prod_rating"] == 1) {
                echo "Rating: *----<br>\n";
            } else if($row["prod_rating"] == 2) {
                echo "Rating: **---<br>\n";
            } else if($row["prod_rating"] == 3) {
                echo "Rating: ***--<br>\n";
            } else if($row["prod_rating"] == 4) {
                echo "Rating: ****-<br>\n";
            } else if($row["prod_rating"] == 5) {
                echo "Rating: *****<br>\n";
            }
            echo "Price: $" . $row["prod_price"]. "<br>\n";
            echo "SKU: " . $row["prod_sku"]. "<br>\n";
            if($row["prod_stock"] == 0) {
                echo " Not in stock<br>\n";
                echo " <a href='store.php'>Back To Store</a>\n";
            }
            else {
                echo " In stock<br>";
                echo " <form action='cart.php' method='post'>\n";
                echo " <input type='hidden' value='$prodID' name='prodID'>\n";
                echo " <input type='submit' value='Add To Cart'>\n";
                echo " </form>";
                echo " <a href='store.php'>Back To Store</a><br>\n";
            }
            echo "  </div>\n";
            echo "  <br><div class='desc-container'>\n";
            echo "<br>Description: " . $row["prod_description"]. "<br>";
            echo "  </div>\n";
            echo "</div>\n";
    }
?>

<?php }
///////////////////////////////////////////////////////////////////
else {
    $num = 0;
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($num == 3)
            {
                echo "<br>";
                echo "<hr>";
                $num = 0;
            }
            echo "<div class='item-container'>\n";
            echo "  <div class='img-container'>\n";
            echo "<img src='" . IMG_DIR . $row["prod_img"] . "' >";
            echo "  </div>\n";
            echo "  <div class='detail-container'>\n";
            echo "<BR>Name: " . $row["prod_name"] . "<br>";
            if($row["prod_rating"] == 1) {
                echo "Rating: *----<br>";
            } else if($row["prod_rating"] == 2) {
                echo "Rating: **---<br>";
            } else if($row["prod_rating"] == 3) {
                echo "Rating: ***--<br>";
            } else if($row["prod_rating"] == 4) {
                echo "Rating: ****-<br>";
            } else if($row["prod_rating"] == 5) {
                echo "Rating: *****<br>";
            }
            echo "Price: $" . $row["prod_price"]. "<br>";
            echo "SKU: " . $row["prod_sku"]. "<br>";
            if($row["prod_stock"] == 0) {
                echo " Not in stock";
            }
            else {
                echo " In stock";
            }
            echo "<li><a href='./store.php?q=".$row['prod_id']."'>View Item</a></li>\n";
            echo "  </div>\n";
            echo "  <br><div class='desc-container'>\n";
            echo "<br>Description: " . $row["prod_description"]. "<br>";
            echo "  </div>\n";
            echo "</div>\n";
            $num++;
        }
    }
    else {
        echo "error: no connection";

    } 
}
?>