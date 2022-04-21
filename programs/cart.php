<?php

if (isset($_GET['item'])) {
    $item = strtolower($_GET['item']);
    if (!isset($_COOKIE['cart']))
        setcookie('cart', json_encode(array(strtolower($item) => 1)), time() + 3600 * 24 * 60);
    else {
        $cart = json_decode($_COOKIE['cart'], true);
        if (array_key_exists($item, $cart)) die("Already in cart");
        $cart[strtolower($item)] =  1;
        setcookie('cart', json_encode($cart), time() + 3600 * 24 * 60);
    }
} else 
if (isset($_GET['quantity'])) {
    $cart = json_decode($_COOKIE['cart'], true);
    extract($_GET);
    $cart[strtolower($key)] = $quantity;
    setcookie('cart', json_encode($cart), time() + 3600 * 24 * 60);
} else {
    header('Location: menu.html');
}
