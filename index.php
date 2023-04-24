<!DOCTYPE html>
<html>
<head>
   <!--metadata-->
    <meta charset="utf-8">
    <meta name="description" content="User Input, with JavaScript">
    <meta name="keywords" content="immaculata, ics2o">
    <meta name="author" content="Savyon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--for favicon on this page-->
   <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
    <link rel="manifest" href="./fav_index/site.webmanifest" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    
    <!--Style on this page-->
    <link rel="stylesheet" href="./css/style.css">
  
	<title>Tim Hortons</title>
</head>
<body>
	<h1>Timbits and Coffee</h1>
	<form method="post" action="">
		<label for="pack">Choose your pack of Timbits:</label>
		<select id="pack" name="pack">
			<option value="3.19">10 pack - $3.19</option>
			<option value="4.99">20 pack - $4.99</option>
			<option value="9.99">50 pack - $9.99</option>
		</select><br><br>

		<label for="toppings">Choose your toppings:</label>
		<select id="toppings" name="toppings[]" multiple>
			<option value="chocolate">Chocolate - $0.02 per Timbit</option>
			<option value="sprinkles">Sprinkles - $0.01 per Timbit</option>
			<option value="strawberry jam">Strawberry Jam - $0.02 per Timbit</option>
			<option value="caramel sauce">Caramel Sauce - $0.01 per Timbit</option>
		</select><br><br>

		<label for="coffee">Choose your coffee size:</label>
		<select id="coffee" name="coffee">
			<option value="small">Small - $1.59</option>
			<option value="medium">Medium - $1.79</option>
			<option value="large">Large - $1.99</option>
		</select><br><br>

		<input type="submit" name="submit" value="Submit Order">
	</form>

	<?php
	if(isset($_POST['submit'])){
		$pack = $_POST['pack'];
		$toppings = isset($_POST['toppings']) ? $_POST['toppings'] : array();
		$coffee = $_POST['coffee'];

		$pack_cost = 0;
		$topping_cost = 0;

		switch ($pack) {
			case '10':
				$pack_cost = 3.99;
				break;
			case '20':
				$pack_cost = 4.99;
				break;
			case '50':
				$pack_cost = 9.99;
				break;
			default:
				break;
		}

		foreach ($toppings as $topping) {
			switch ($topping) {
				case 'chocolate':
					$topping_cost += 0.02;
					break;
				case 'sprinkles':
					$topping_cost += 0.01;
					break;
				case 'strawberry jam':
					$topping_cost += 0.02;
					break;
				case 'caramel sauce':
					$topping_cost += 0.01;
					break;
				default:
					break;
			}
		}

		switch ($coffee) {
			case 'small':
				$coffee_cost = 1.59;
				break;
			case 'medium':
				$coffee_cost = 1.79;
				break;
			case 'large':
				$coffee_cost = 1.99;
				break;
			default:
				break;
		}

		$subtotal = round(($pack_cost * $pack + $topping_cost * $pack + $coffee_cost), 2);
    $total = round(($subtotal + ($subtotal * 0.13)), 2);

    echo "<h2>Your Order Summary</h2>";
    echo "<ul>";
    echo "<li>Pack of Timbits: Timbits for $pack</li>";
    if (!empty($toppings)) {
        echo "<li>Toppings: " . implode(", ", $toppings) . ", at $$topping_cost per Timbit</li>";
    }
    echo "<li>Coffee: $coffee, at $$coffee_cost per cup</li>";
    echo "<li>Subtotal: $$subtotal</li>";
    echo "<li>Total (including 13% HST): $$total</li>";
    echo "</ul>";
}
?>
<!--gif on this page-->
	<img src="./images/timbits.gif" alt="timbits" height = "200" width="200">

<!--image on this page-->
	<img src="./images/coffee.webp" alt="timbits" height = "200" width="200">