<?php

$pagename='product buy';

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

echo "<title>".$pagename. "</title>";

echo "<body>";

include('headfile.html');

include("db.php");

echo "<h4>".$pagename."</h4>";

$prodid = $_GET['u_prod_id'];
// echo "<p> Selcted prodict ID: ".$prodid."</p>";

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId='$prodid'";

//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";

//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
//display the small image whose name is contained in the array
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=300 width=300>";
"</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5><br>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripLong']."</p><br>";
echo "<p>".$arrayp['prodPrice']."</p><br>";
echo "<p><b> $".$arrayp['prodQuantity']."</p><br>";

echo "<br><p> Number to Purchased: </p>";

// create form made of one text field and one button for user to enter quantity
// the value entered in the form will be posted to the basket.php to e processed
echo "<form action=basket.php method=post>";
// echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<select name=p_quantity>";

for($p=1; $p <= $arrayp['prodQuantity']; $p++){
    echo "<option value='" .$p. "'>" .$p."</option>";
};

echo "</select>";

echo "<input type=submit name=submitbtn value='ADD TO BASKET' id='submitbtn'>";

// pass the product id to the next page bascket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
echo "</p>";

echo "</td>";
echo "</tr>";
}
echo "</table>";

include('footer.html');

echo "</body>" ;
?>