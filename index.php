<!DOCTYPE html>
<html>
<head>
  
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="description" content="User Input, with JavaScript">
    <meta name="keywords" content="immaculata, ics2o">
    <meta name="author" content="Savyon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon on this tab -->
    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png">
    <link rel="manifest" href="./fav_index/site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Style for this page -->
    <link rel="stylesheet" href="./css/style.css">

    <title>Tim Hortons</title>
</head>
<body>
    <h1>Timbits and Coffee</h1>
  
    <!--area for user to enter order-->
    <form method="post" action="">
        <label for="timbits">Choose your pack of Timbits:</label>
        <select id="timbits" name="timbits">
            <option value="3.19">10 pack - $3.19</option>
            <option value="4.99">20 pack - $4.99</option>
            <option value="9.99">50 pack - $9.99</option>
        </select><br><br>

        <label for="toppings">Choose your toppings:</label>
        <select id="toppings" name="toppings[]" multiple>
            <option value="0.02">Chocolate - $0.02</option>
            <option value="0.02">Sprinkles - $0.02</option>
            <option value="0.02">Strawberry Jam - $0.02</option>
            <option value="0.02">Caramel Sauce - $0.02</option>
        </select><br><br>

        <label for="secondToppings">Extra topping:</label>
        <select id="secondToppings" name="secondToppings[]" multiple>
            <option value="0.02">Chocolate - $0.02</option>
            <option value="0.02">Sprinkles - $0.02</option>
            <option value="0.02">Strawberry Jam - $0.02</option>
            <option value="0.02">Caramel Sauce - $0.02</option>
        </select><br><br>

        <label for="coffee">Choose your coffee size:</label>
        <select id="coffee" name="coffee">
            <option value="1.59">Small - $1.59</option>
            <option value="1.79">Medium - $1.79</option>
            <option value="1.99">Large - $1.99</option>
        </select><br><br>

        <input type="submit" name="submit" value="Submit Order">
    </form>

          <?php

//get form inputs from user
if (isset($_POST['submit'])) {
    $pack = $_POST['timbits'];
    $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : array();
    $secondToppings = isset($_POST['secondToppings']) ? $_POST['secondToppings'] : array();
    $coffee = $_POST['coffee'];

    $pack_cost = 0;
    $topping_cost = 0;
    $secondTopping_cost = 0;

    // Determine the cost of the selected pack of Timbits
    switch ($pack) {
        case '3.19':
            $pack_cost = 3.19;
            break;
        case '4.99':
            $pack_cost = 4.99;
            break;
        case '9.99':
            $pack_cost = 9.99;
            break;
        default:
            break;
    }

    // Calculate the cost of selected toppings
    foreach ($toppings as $topping) {
        switch ($topping) {
            case '0.02':
                $topping_cost += 0.02;
                break;
            default:
                break;
        }
    }

    // Calculate the cost of selected second toppings
    foreach ($secondToppings as $secondTopping) {
        switch ($secondTopping) {
            case '0.02':
                $secondTopping_cost += 0.02;
                break;
            default:
                break;
        }
    }

    // Determine the cost of the selected coffee size
    switch ($coffee) {
        case '1.59':
            $coffee_cost = 1.59;
            break;
        case '1.79':
            $coffee_cost = 1.79;
            break;
        case '1.99':
            $coffee_cost = 1.99;
            break;
        default:
            break;
    }

    // Calculate the subtotal and total of the order
    $subtotal = number_format(($pack_cost * 1) + ($topping_cost * count($toppings)) + ($secondTopping_cost * count($secondToppings)) + ($coffee_cost * 1), 2);
    $total = number_format($subtotal * 1.13, 2);
    ?>
    <h2>Your Order Summary</h2>
    <ul>
        <li>Pack of Timbits for $<?php echo $pack_cost; ?></li>
        <?php
        if (!empty($toppings)) {
            echo "<li>Toppings: $" . implode(", ", $toppings) . ", at $" . $topping_cost . "</li>";
        }
        if (!empty($secondToppings)) {
            echo "<li>Extra Topping: " . implode(", ", $secondToppings) . ", at $" . $secondTopping_cost . "</li>";
        }
        ?>
        <li>Coffee: $<?php echo $coffee_cost; ?>, at $<?php echo $coffee_cost; ?> per cup</li>
        <li>Subtotal: $<?php echo $subtotal; ?></li>
        <li>Total (including 13% HST): $<?php echo $total; ?></li>
    </ul>

    <?php
}

// GIF on this page
echo '<img src="./images/timbits.gif" alt="timbits" height="200" width="200">';

// Image on this page
echo '<img src="./images/coffee.webp" alt="coffee" height="200" width="200">';