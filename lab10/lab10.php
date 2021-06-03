<?php

$servername = "localhost";
$username = "nkalar";
$password = "edwinblue";
$dbname = "nkalar";

$connect = new mysqli($servername, $username, $password, $dbname);

if($connect->connect_error)
{
    exit("bad connection\n");
}

define("IMG_DIR", "images/");

function page_build($connect, $sql) {
    $num = 0;
    $result = mysqli_query($connect, $sql);
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
            echo "  </div>\n";
            echo "  <br><div class='desc-container'>\n";
            echo "<br>Description: " . $row["prod_description"]. "<br>";
            echo "  </div>\n";
            echo "</div>\n";
            $num++;
        }
    }
    else {
        $sql =
                "SELECT prod_name, prod_img, prod_description,
                 prod_price, prod_rating, prod_sku, prod_stock
                 FROM Products";
                page_build($connect, $sql);

    }
}


$sql= '';
if(isset($_GET['sortby'])) {
  switch($_GET['sortby']) {

    case 'rating':
    $sql = "SELECT prod_name, prod_img, prod_description,
            prod_price, prod_rating, prod_sku, prod_stock
            FROM Products ORDER BY prod_rating DESC, prod_stock DESC";
           break;

    case 'priceHighToLow':
    $sql = "SELECT prod_name, prod_img, prod_description,
            prod_price, prod_rating, prod_sku, prod_stock
            FROM Products ORDER BY prod_price DESC";
           break;

    case 'priceLowToHigh':
    $sql = "SELECT prod_name, prod_img, prod_description,
            prod_price, prod_rating, prod_sku, prod_stock
            FROM Products ORDER BY prod_price ASC";
           break;

    case'':
    default:
    $sql = "SELECT prod_name, prod_img, prod_description,
            prod_price, prod_rating, prod_sku, prod_stock
            FROM Products";
           break;
}
}

include_once('head.php');
include_once('nav.php');
include_once('footer.php');
?>

<form method='GET' action='lab10.php'>
  <label for='sortby'>Sort By</label>
  <select name='sortby' id='sortby' onchange='this.form.submit()'>
    <option value=''> </option>
    <option value='rating'>Rating</option>
    <option value='priceHighToLow'>Price High to Low </option>
    <option value='priceLowToHigh'>Price Low to High </option>
  </select>
</form>
<?php page_build($connect, $sql); ?>
</body>
</html>