<?php
session_start();
include ("db.php");
$pageName="smart basket"; //Create and populate a variable called $pageName
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pageName."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file

echo "<h4>".$pageName."</h4>"; //display name of the page on the web page

//if the the post of the hidden ID of the product to be removed is set
if (isset($_POST['del_prodid']))
{
//retrieve the ID of the product to be removed passed by form from same page using the POST method
$delProdId=$_POST['del_prodid'];
//unset the column of the session array for which the key is this posted product ID variable
unset ($_SESSION['basket'][$delProdId]);
//display a message "1 item removed from the basket"
echo " <p class='updateInfo'><b>1 item removed</b></p>";
}

//if the post of the hidden ID of the new product is set
//Meaning: if the user is adding a new product into the basket
if (isset($_POST['h_prodid']))
{
//retrieve the seelcted product id passed by form from previous page using the POST method
//it uses the $_POST superglobal variable to collect the value of the hidden form element h_prodid created on prodbuy.php
//assign the value to a local variable called $newProdId
$newProdId=$_POST['h_prodid'];

//retrieve the required quantity passed by form from previous page using the POST method
//it uses the $_POST superglobal variable to collect the value of the drop-down list selection prod_quantity created on prodbuy.php
//assign the value to a local variable called $requQuantity
$requQuantity =$_POST['prod_quantity'];

//Display id of selected product, for debugging. Hide later.
//echo "<p class='updateInfo'>Id of selected product: ".$newProdId."</p>";

//Display quantity of selected product, for debugging. Hide later.
//echo "<p class='updateInfo'>Quantity of selected product: ".$requQuantity ."</p>";

//set a two-dimensional associative array for the basket session called $_SESSION.
//create a new row 'basket' in the session $_SESSION['basket'].
//create a new column in the session array & index it with a key (the $newProdId varianle): $_SESSION['basket'][$newProdId]
//assign the required product quantity $requQuantity as a value that corresponds to this key.
$_SESSION['basket'][$newProdId]=$requQuantity;
echo "<p class='updateInfo'><b>1 item added</b></p>";
}
//else, the user is not adding a new product in the basket
else{
    //displays a message 'basket unchanged'.
    echo "<p class='updateInfo'<b>Basket unchanged</b></p>";
}

$total= 0; //create a variable $total and initialize it to zero
//create HTML table with header to display the content of the basket: prod name, price, selected quantity and subtotal
echo "<p><table id='baskettable'>";
echo "<tr>";
echo "<th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th>";
echo "</tr>";
//if the session array $_SESSION['basket'] is set
if (isset($_SESSION['basket']))
{
//iterate through the associative array for the session with a FOR EACH LOOP & for each data item in the array:
//retrieve the product ID and assign it to a variable $key
//retrieve the quantity and assign it to a variable $value
foreach($_SESSION['basket'] as $key => $value) //see https://www.w3schools.com/php/php_looping_foreach.asp
{
//create a SQL query to retrieve from Product table, the details of the selected product for which ID matches $key
//execute query and retrieve results in associative array arrayProd
$SQL="select prodId, prodName, prodPrice from Product where prodId=".$key;
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
$arrayProd=mysqli_fetch_assoc($exeSQL);
echo "<tr>";
//display product name and product price using array of records $arrayProd.
echo "<td>".$arrayProd['prodName']."</td>";
echo "<td>&pound".number_format($arrayProd['prodPrice'],2)."</td>";
//display selected quantity of product retrieved from the current iteration of the session array and now in $value.
echo "<td style='text-align:center;'>".$value."</td>";
//calculate subtotal, assign it to a local variable $subtotal and display it.
$subtotal=$arrayProd['prodPrice'] * $value;
echo "<td>&pound".number_format($subtotal,2)."</td>";
echo "</tr>";
//increase total by adding the subtotal to the current total
$total=$total+$subtotal;
}
}

//else display empty basket message
else 
{
echo " <p class='updateInfo'><b>Empty basket</b></p>";
}
// Display total
echo "<tr>";
echo "<td colspan=3><b>TOTAL</b></td>";
echo "<td><b>&pound".number_format($total,2)."</b></td>";
echo "</tr>";
echo "</table>";
mysqli_close($conn); //close database connection

//create anchor to call clearbasket.php to clear basket
echo "<br><p class='updateInfo'><a href='clearbasket.php'>CLEAR BASKET</a></p>";

//create anchor to call signup.php for new users to register
echo "<p class='updateInfo'>New homteq customers: <a href='signup.php'>Sign up</a></p>";
//create anchor to call signup.php for existing members to sign in
echo "<p class='updateInfo'>Returning homteq customers: <a href='login.php'>Login</a></p>";

//create HTML form made of one remove button
//the value captured through the form will be posted back to the basket.php to be processed

echo "<td>";
echo "<form action='basket.php' method=post>";
echo "<input type='submit' value='Remove' id='submitbtn'>"; //remove button
echo "<input type='hidden' name='del_prodid' value=".$arrayProd['prodId'].">"; //hidden field to capture id.
echo "</form>";
echo "</td>";

include("footfile.html"); //include head layout
echo "</body>";
?>
