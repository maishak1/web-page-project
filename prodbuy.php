<?php
include ("db.php");  // include db.php file to connect to DB
$pageName="a smart buy for a smart home"; //Create and populate a variable called $pageName
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pageName."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file

echo "<h4>".$pageName."</h4>"; //display name of the page on the web page
//retrieve the product id passed by URL from previous page using the GET method
//it uses the $_GET superglobal variable to collect the value of the URL parameter u_prod_id
//assign the value to a local variable called $prodId
$prodId=$_GET['u_prod_id']; //see https://www.w3schools.com/php/php_superglobals_get.asp
echo "<p>Selected product Id: ".$prodId."</p>"; //display the value of the product id, for debugging purposes.

//create a $SQL variable and assign to it a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity 
from Product
where prodId=".$prodId;
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

$arrayPr=mysqli_fetch_assoc($exeSQL);
echo "<table style='border: 0px'>";
echo "<tr>";
echo "<td style='border: 0px'>";
echo "<img src='images/".$arrayPr['prodPicNameLarge']." height=350 width=350>"; //display large image
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayPr['prodName']."</h5></p>"; //display product name
echo "<p class='updateInfo'>".$arrayPr['prodDescripLong']."</p>";
echo "<p class='updateInfo'><b>&pound".$arrayPr['prodPrice']."</b></p>";
echo "<p class='updateInfo'>Number left in stock: ".$arrayPr['prodQuantity']."</p>";

echo "<p class='updateInfo'>Number to be purchased: </p>";
//create HTML form made of one text field and one button for user to enter required quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action='basket.php' method='post'>"; //action is page to be called, method is POST
echo "<p class='updateInfo'><select name='prod_quantity'>";
for ($i=1; $i<=$arrayPr['prodQuantity']; $i++)
{
    echo "<option value=".$i.">".$i."</option>"; //display current value in dropdown, pass current value
}
echo "</select>"; // close dropdown
echo "<input type='submit' name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
echo "<input type='hidden' name='h_prodid' value=".$prodId.">"; //pass product id to next page basket.php as hidden value
echo "</p>";
echo "</form>";

echo "</td>";
echo "</td>";
echo "</tr>";
echo "</table>"; //close HTML table


mysqli_close($conn); //close database connection

include("footfile.html"); //include head layout
echo "</body>";
?>
