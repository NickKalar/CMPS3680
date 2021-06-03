<?php
require_once('connect.php'); // $db object
//set empty form variables
$pname = '';
$pimg = '';
$pdesc = '';
$pprice = '';
$prating = '';
$psku = '';
$pstock = '';
$q=0;
if(isset($_GET['q']) || isset($_POST['q'])){
    if(!empty($_GET['q']))
        $q = htmlentities($_GET['q']);
    else if(!empty($_POST['q']))
        $q = htmlentities($_POST['q']);
    $q = ($q<0)?0:$q;
}
if(isset($_POST['pname']) && !empty($_POST['pname'])){
   $pname = dehack($_POST['']);
}
if(isset($_POST['pimg']) && !empty($_POST['pimg'])){
    $pimg = dehack($_POST['pimg']);
}
if(isset($_POST['pdesc']) && !empty($_POST['pdesc'])){
    $pdesc = dehack($_POST['pdesc']);
}
if(isset($_POST['pprice']) && !empty($_POST['pprice'])){
    $pprice = dehack($_POST['pprice']);
}
if(isset($_POST['prating']) && !empty($_POST['prating'])){
    $prating = dehack($_POST['prating']);
}
if(isset($_POST['psku']) && !empty($_POST['psku'])){
    $psku = dehack($_POST['psku']);
}
if(isset($_POST['pstock']) && !empty($_POST['pstock'])){
    $pstock = dehack($_POST['pstock']);
}

function dehack($input){
    return htmlentities(strip_tags(stripslashes(trim($input))));
}

//HANDLE_INSERT_UPDATE_DELETE//////////////////////////
if(isset($_POST['action']) && !empty($_POST['action'])) {
    switch($_POST['action']) { // white list
    case "INSERT": 
        echo "<h4>INSERT</h4>";
        $sql = "INSERT INTO Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock)
        VALUES ('$pname','$pimg', '$pdesc', '$pprice', '$prating', '$psku', '$pstock')";
        if($db->query($sql) === TRUE){
            echo "You did it!";
        }
        else {
            echo $db->error;
        }
        break;
    case "UPDATE":
        echo "<h4>UPDATE</h4>";
        $sql = "UPDATE Products
                SET prod_name = '$pname',
                prod_img = '$pimg',
                prod_description = '$pdesc',
                prod_price = '$pprice',
                prod_sku = '$psku',
                prod_stock = '$pstock'
                WHERE prod_sku = '$psku' ";

        if ($db->query($sql) === TRUE) {
            echo "It's been changed, boss";
        } 
        else {
        echo $db->error;
        }
        break;
    case "DELETE":
        echo "<h4>DELETE</h4>";
        $sql = "DELETE FROM Products WHERE prod_sku = '$sku'";
        if ($db->query($sql) === TRUE) {
          echo "Hasta la vista, entry";
        } else {
          echo $db->error;
        }

        $q=0;
        break;
    }
    //PERFORM_ACTION////////////////////////////
    // db->query($sql)
}///////////////////////////////////////////////////////


//POPULATE_FORM_DATA///////////////////////////////////
if($q>0) {
    $sql = "SELECT * FROM Products";
    if($res = $db->query($sql)) {
        if($q < $res->num_rows){
            $res->data_seek($q - 1);
            if($row = $res->fetch_assoc() ) {
                /*
                echo "<hr><pre>";
                var_dump($row);
                echo "</pre>";
                */
                
                //POPULATE_VARIABLES_IN_FORM/////////
                $pname = $row['prod_name'];
                $pimg = $row['prod_img'];
                $pdesc = $row['prod_description'];
                $pprice = $row['prod_price'];
                $prating = $row['prod_rating'];
                $psku = $row['prod_sku'];
                $pstock = $row['prod_stock'];
            }
        }//q<num_rows
        else $q=0;
    }//query
}//$q>0

//PRINT_FORM////////////////////////////////////////////////////?>
<form action='admin.php' method='POST'><br>
Product Name:<input type='text' name='pname' value='<?php echo $pname;?>'><br>
Image name:<input type='text' name='pimg' value='<?php echo $pimg;?>'><br>
Description:<input type='text' name='pdesc' value='<?php echo $pdesc;?>'><br>
Price:<input type='text' name='pprice' value='<?php echo $pprice;?>'><br>
Rating:<input type='text' name='prating' value='<?php echo $prating;?>'><br>
SKU:<input type='text' name='psku' value='<?php echo $psku;?>'><br>
Stock:<input type='text' name='pstock' value='<?php echo $pstock;?>'><br>


<br>
<input type='hidden' value='<?php echo $q;?>'>
<input type='submit' value='INSERT' name='action'>
<input type='submit' value='UPDATE' name='action'>
<input type='submit' value='DELETE' name='action'>
</form>
<?php
echo "<a href='https://cs.csubak.edu/~nkalar/CMPS3680/lab11/admin.php?q=".($q-1)."'><button>&larr;Prev ".($q)."</button></a>";
echo "<a href='https://cs.csubak.edu/~nkalar/CMPS3680/lab11/admin.php?q=".($q+1)."'><button>".($q+1)." Next&rarr;</button></a>";
?>

<style>
input[type='text']{
width:100%;
}
input[type='submit']{
width:32%;
}
button{
width:49%;
}
</style>



