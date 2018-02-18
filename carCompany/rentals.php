<?php

//Initialization part
$dbh = new PDO('mysql:host=localhost;dbname=carCompany', 'root', 'rootroot');

$query=" ";

//2 prepare query
if (isset($_POST["car_name"])){
   // $query = "SELECT * FROM cars WHERE car_name=' " . $_POST["car_name"] . " ' ; ";
   $query ="SELECT * FROM cars WHERE car_name='" . $_POST["car_name"] . "';";

} else {
    $query = "SELECT * FROM cars;";
}


//3 prepare statement
$car_fetch = $dbh->prepare($query);

// 4 execute
$car_fetch_result = $car_fetch->execute([]);
//$car_fetch->setFetchMode(PDO::FETCH_ASSOC);

//5 fetch
$car_fetch_output = $car_fetch->fetchAll();
var_dump($car_fetch_output);


//to insert later possibly
//isset($_POST["car_name"]) &&
// car_name=' " . $_POST["car_name"] . "' AND

//if (isset($_POST["amount_in_stock"]) && isset($_POST["rental_price_per_day"])){
   // $query = "SELECT * FROM cars WHERE  amount_in_stock > ". $_POST["amount_in_stock"] . "AND rental_price_per_day < " . $_POST//["rental_price_per_day"] . " ; ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>carCompany</title>
</head>
<body>

<h1> Car booking system</h1>

<form method="GET">
    <label>Car name: <input type="text" name="car_name"/>
    </label>

    <br>

    <label>Amount in stock:
    <input type="amount_in_stock"/></label>

    <br>

    <label>Price per day:
    <input type="rental_price_per_day"/></label>

    <input type="submit" value="Search"/>
</form>

<p>Available cars</p>
<table border="1">
<?php
$statement = $dbh->query("SELECT * FROM cars");
foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $row) {
	echo "<tr><td>" . join('</td><td>', $row) . '</td></tr>';
}
?>

</table>

<p>Your results</p>
<?php
//echo "<table>
        //<tr><td><b>Car Name</b></td><td><b>Amount in stock</b></td><td><b>Rental price per day</b></td></tr>";
        //for($car_fetch_output as $result){
          //echo "<tr><td>" . $result["car_name"] . "</td><td>" . $result["amount_in_stock"] . "</td><td>" . $result["rental_price_per_day"] . //"</td></tr>";
        //}
//echo "</table>";
?>






</body>
</html>