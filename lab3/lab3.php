<?php

$stock = array(
  array(
    'Name'=>"Simple Lamp",
    'Image'=>"/lamp1.jpg",
    'Description'=>"Perfect for bedrooms, kids and teens, college dorms, nurseries, or fun offices.",
    'Price'=>19.99,
    'Rating'=>4,
    'SKU'=>12345,
    'Stock'=>1
  ),
  array(
    'Name'=>"Hipster Lamp",
    'Image'=>"/lamp2.jpg",
    'Description'=>"Gentle on the eyes: provides a flicker-free lighting for reading, working, or studying.",
    'Price'=>29.99,
    'Rating'=>3,
    'SKU'=>12346,
    'Stock'=>1
  ),
  array(
    'Name'=>"Cheap Lamp",
    'Image'=>"/lamp3.jpg",
    'Description'=>"The desktop lamp stands 16.9” (H) x 5.9” (W), with 67 inches’ power cord that allows you to place your lamp where you need it most for easy access. It is a small lamp that punches a lot of light, able to brighten up a room by itself. Place on a desk or bedside table for a modest, refined look in fashion lighting.",
    'Price'=>9.99,
    'Rating'=>5,
    'SKU'=>12347,
    'Stock'=>0
  ),
  array(
    'Name'=>"Utility Lamp",
    'Image'=>"/lamp4.jpg",
    'Description'=>"The bedside table lamp has a Dual 2.1A USB Port with Outlet. where you can charge your phone! The outlet only accept Maximum 1500Watts.Due to safety concerns, we recommend use low wattage electronic products.",
    'Price'=>36.99,
    'Rating'=>1,
    'SKU'=>12348,
    'Stock'=>1
  ),
  array(
    'Name'=>"Feature Lamp",
    'Image'=>"/lamp5.jpg",
    'Description'=>"LAMPAT Dimmable LED Desk Lamp, Black",
    'Price'=>29.99,
    'Rating'=>2,
    'SKU'=>12349,
    'Stock'=>1
  ),
  array(
    'Name'=>"Pricey Lamp",
    'Image'=>"/lamp6.jpg",
    'Description'=>"Overall: 22 1/2\" high. Arm extension is 8\". Base is 6\" wide. Shade is 7\" across the top x 11\" across the bottom x 7 1/2\" high.",
    'Price'=>59.95,
    'Rating'=>5,
    'SKU'=>12350,
    'Stock'=>0
  )
);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$TITLE = 'Array Sorting Lab';
$CSS = 'style.css';
$DEVELOPER_MODE = 1;
$image;
$name;
$desc;
$price;
$rate;
$sku;
$stock;
$row = 0;

echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";

echo "  <head>\n";
echo "    <title>".$TITLE."</title>\n";
echo "    <link rel=\"stylesheet\" href=\"".$CSS."\">\n";
echo "  </head>\n";

echo "  <body>\n";
echo "    <input type='button' id='highLow' value='High to Low' />\n";
echo "    <input type='button' id='lowHigh' value='Low to High' /><br><br><hr>\n";

foreach ($stock as $inv) {
    foreach ($inv as $key=>$val) {
        switch ($key) {
          case 'Name':
                $name = $val;
                break;
          case 'Image':
                $image = $val;
                break;
          case 'Description':
                $desc = $val;
                break;
          case 'Price':
                $price = $val;
                break;
          case 'Rating':
                if ($val == 5) {
                    $rate = "* * * * *";
                } elseif ($val == 4) {
                    $rate = "* * * * _";
                } elseif ($val == 3) {
                    $rate = "* * * _ _";
                } elseif ($val == 2) {
                    $rate = "* * _ _ _";
                } elseif ($val == 1) {
                    $rate = "* _ _ _ _";
                } else {
                    $rate = "_ _ _ _ _";
                }
                break;
          case 'SKU':
                $sku = $val;
                break;
          case 'Stock':
                if ($val == 1) {
                    $stock = "In-Stock";
                } else {
                    $stock = "Out of Stock";
                }
                break;
        }
    }
    echo "<div class='item-container'>\n";
    echo "  <div class='img-container'>\n";
    echo "    <img src='photos".$image."' class='thumbnail'>\n";
    echo "  </div>\n";
    echo "  <div class='detail-container'>\n";
    echo "    <p>Name: ".$name."\n";
    echo "    <br>Rating: ".$rate."\n";
    echo "    <br>Price: ".$price."\n";
    echo "    <br>SKU: ".$sku."\n";
    echo "    <br>".$stock."</p>\n";
    echo "  </div>\n";
    echo "  <div class='desc-container'>\n";
    echo "    <p>Description: ".$desc."</p>\n";
    echo "  </div>\n";
    echo "</div>\n";
    $row++;
    if($row == 2) {
      echo "<br><hr>\n";
      $row = 0;
    }
}


echo "  </body>\n";
?>
<script>

document.getElementById('highLow').addEventListener('click', function() {
  <?php usort($stock, function($a, $b) {
      if ($a['Rating'] == $b['Rating']) {
          return 0;
      }
      return ($a['Rating'] > $b['Rating']) ? -1 : 1;
  }) ?>;
  window.location.reload(false);
});

document.getElementById('lowHigh').addEventListener('click', function() {
  <?php usort($stock, function($a, $b) {
      if ($a['Rating'] == $b['Rating']) {
          return 0;
      }
      return ($a['Rating'] < $b['Rating']) ? -1 : 1;
  }) ?>;
  window.location.reload(false);
});

</script>

<?php
echo "</html>";
?>
