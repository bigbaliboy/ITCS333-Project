<?php
session_start();
if (isset($_POST)) {
    extract($_POST);
    if (isset($name) && isset($quantity)) {
        echo "it is working";
        $name = json_decode($name, true);
        $quantity = json_decode($quantity, true);
        foreach ($name as $key => $val) {
            $item[strtolower($val)] = $quantity[$key];
        }
        print_r($item);
        if (!isset($_COOKIE['cart'])) {
            setcookie('cart', json_encode($item), time() + 3600 * 24 * 60);
            header('Location: showCart.php');
        }
        else {
            // echo "Your cart is not empty";
            $cart = json_decode($_COOKIE['cart'], true);
            foreach ($name as $key => $val) {
                if (array_key_exists($val, $cart)) continue;
                $cart[strtolower($val)] =  $quantity[$key];
            }
            setcookie('cart', json_encode($cart), time() + 3600 * 24 * 60);
            header('Location: showCart.php');
        }
    }
}
