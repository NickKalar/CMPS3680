<?php
include('nav.php');
include('footer.php');
$servername = "localhost";
$username = "nkalar";
$password = "edwinblue";
$dbname = "nkalar";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    exit("bad connection\n");
}

$sql = "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('Intel Core i9-9900K','i9.jpg', 'Coffee Lake 8-Core, 16-thread 3.6 GHz (5.0 GHz turbo) LGA 1151', '524.99', '5', '12345', '12');";
$sql .= "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('Intel Core i7-9700K', 'i7.jpg', 'Coffee Lake 8-Core 3.6 GHz (4.9 GHz Turbo) LGA 1151', '409.99', '3', '12346', '0');";
$sql .= "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('Intel Core i5-9600K','i5.jpg', 'Coffee Lake 6-Core 3.7 GHz (4.6 GHz Turbo) LGA 1151', '264.99', '4', '12347', '7');";
$sql .= "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('AMD RYZEN 7 2700X','ryzen7.jpg', '8-Core 3.7 GHz (4.3 GHz Max Boost) Socket AM4', '294.99', '2', '12348', '2');";
$sql .= "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('AMD CPU FX-8350 Black Edition','fx8350.jpg', '4.0 GHz (4.2 GHz Turbo) Socket AM3+', '89.99', '3', '12349', '0');";
$sql .= "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
VALUES ('AMD A8-9600','a8.jpg', 'Bristol Ridge Quad-Core 3.1 GHz Socket AM4', '67.99', '1', '12350', '1')";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
