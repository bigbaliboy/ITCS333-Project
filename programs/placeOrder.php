<?php
session_start();
extract($_POST);
//if there is no carrt, redirect
if (!isset($_COOKIE['cart'])) header('Location: showMenu.php');
try {
    require('connection.php');
    //if not sihgned i, redirect
    if (!isset($_SESSION)) {
        header('Location: menu.html');
    }
    //inserting order details
    $db->beginTransaction();
    $cart = json_decode($_COOKIE['cart'], true);
    $insrtOrder = $db->prepare("Insert INTO `orders` (Date,customerEmail) values (:Date, :customerEmail)");
    $insrtOrder->bindParam(':Date', $date);
    $insrtOrder->bindParam(':customerEmail', $orderEmail);

    $orderEmail = $_SESSION['login'];
    $date = date('Y-m-d H:i:s');
    $insrtOrder->execute();
    $lastID = $db->lastInsertID();
    //inserting items and quantity in orderItems
    $insrtOrderItem = $db->prepare("Insert INTO orderitems (orderNumber,MealName,Quantity) values (:orderNumber, :MealName, :Quantity)");
    $insrtOrderItem->bindParam(':orderNumber', $lastID);
    $insrtOrderItem->bindParam(':MealName', $mealName);
    $insrtOrderItem->bindParam(':Quantity', $qty);

    foreach ($cart as $mealName => $qty) {
        $insrtOrderItem->execute();
    }
    $db->commit();
    $db = null;

    // CLEARING THE COOKIE
    setcookie('cart', json_encode($cart), time() - 3600 * 24 * 60);
    echo "<h1 class='center'>Order Placed Successfully!</h1>";
    header('Location: index.php');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
//find total
//view message before timeout
