<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: signIn.php');
}
if (isset($_COOKIE['cart'])) {
try {
    $cart = json_decode($_COOKIE['cart'], true);
    if (isset($_GET['remove'])) {
        unset($cart[strtolower($_GET['remove'])]);
        setcookie('cart', json_encode($cart), time() + 3600 * 24 * 60);
        if (count($cart) == 0)
        setcookie('cart', json_encode($cart), time() - 3600 * 24 * 60);
        die("Item has been removed");
    }
    require('connection.php');
    $sql = 'SELECT * FROM `menu`';
    $row = $db->query($sql)->fetchAll();
    foreach ($row as $key => $meal) {
        if (!array_key_exists(strtolower($meal[1]), $cart)) continue;
        if ($meal[3] == "Burger")
            $burger[strtolower($meal[1])][0] = $meal;
        else if ($meal[3] == "Snack")
            $snack[strtolower($meal[1])][0] = $meal;
        else if ($meal[3] == "Salad")
            $salad[strtolower($meal[1])][0] = $meal;
        else if ($meal[3] == "Drink")
            $drink[strtolower($meal[1])][0] = $meal;
    }

    if (isset($burger))
        foreach ($burger as $key => $mealDetails)
            $burger[$key][1] = $cart[$key];
    if (isset($snack))
        foreach ($snack as $key => $mealDetails)
            $snack[$key][1] = $cart[$key];
    if (isset($salad))
        foreach ($salad as $key => $mealDetails)
            $salad[$key][1] = $cart[$key];
    if (isset($drink))
        foreach ($drink as $key => $mealDetails)
            $drink[$key][1] = $cart[$key];
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css-reset.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />

<style>
        body {
            background-image: url('images/au-bg3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }

        p,
        h4 {
            color: white;
        }
        .noItem {
            color: white;
            margin: 50px;
        }
        .quant {
            color: white;
        }
        nav{
            color: white;
        }
        i {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <!-- MENU -->
    <div class="container menu-class mt-5">
        <div class="title">
            <h4 class="font-weight-bold text-monospace">
                <!--<span class="font-italic">Tasty menu of the week</span>-->Cart
            </h4>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark navcolor">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center">
                    <a class="navbar-brand text-decoration text-light" href="#burger">
                        <i class="fas fa-hamburger"></i> Burgers
                    </a>

                    <a class="navbar-brand text-decoration text-light" href="#snaks">
                        <i class="fas fa-utensils"></i> Snacks & Sides</a>

                    <a class="navbar-brand text-decoration text-light" href="#salad">
                        <i class="fas fa-seedling"></i> Salad
                    </a>

                    <a class="navbar-brand text-decoration text-light" href="#drink">
                        <i class="fas fa-glass-martini-alt"></i> Drink
                    </a>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 rm-5 m-sm-auto" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-danger my-2 ml-md-3 m-sm-auto" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </nav>



        <?php
        if (isset($_COOKIE['cart'])) {
        if (isset($burger)) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark navcolor">Burger</nav>
            <h2 id="burger" class="lead text-monospace"></h2>

            <div class="single-menu row">
                <?php
                foreach ($burger as $key => $mealDetails) {
                    echo "<div class='col-12 col-md-6'>";
                    echo "<img src='imagesMenu/" . $mealDetails[0][4] . "' alt='' class='img-fluid' />";
                    echo "<div class='menu-content'>";
                    echo "<h4>" . $mealDetails[0][1] . "<span>BD " . $mealDetails[0][2] . "</span></h4>";
                    echo "<p>" .
                        $mealDetails[0][5]
                        . "</p>";
                    echo "<i class='bx bx-cart-alt'>Remove</i>";
                    echo '<lablel class="quant">Quantity </label><input type=number value=' . $mealDetails[1] . " min=1>";
                    echo "</div></div>";
                }
                ?>
            </div>
        <?php }
        if (isset($snack)) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark navcolor">SNACKS</nav>
            <h2 id="snaks" class="lead text-monospace"></h2>
            <div class="single-menu row">
                <?php
                foreach ($snack as $key => $mealDetails) {
                    echo "<div class='col-12 col-md-6'>";
                    echo "<img src='imagesMenu/" . $mealDetails[0][4] . "' alt='' class='img-fluid' />";
                    echo "<div class='menu-content'>";
                    echo "<h4>" . $mealDetails[0][1] . "<span>BD " . $mealDetails[0][2] . "</span></h4>";
                    echo "<p>" .
                        $mealDetails[0][5]
                        . "</p>";
                    echo "<i class='bx bx-cart-alt'>Remove</i>";
                    echo '<lablell class="quant">Quantity </label><input type=number value=' . $mealDetails[1] . " min=1>";
                    echo "</div></div>";
                }
                ?>
            </div>
        <?php }
        if (isset($salad)) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark navcolor">Salad</nav>
            <h2 id="salad" class="lead text-monospace"></h2>
            <div class="single-menu row">
                <?php
                foreach ($salad as $key => $mealDetails) {
                    echo "<div class='col-12 col-md-6'>";
                    echo "<img src='imagesMenu/" . $mealDetails[0][4] . "' alt='' class='img-fluid' />";
                    echo "<div class='menu-content'>";
                    echo "<h4>" . $mealDetails[0][1] . "<span>BD " . $mealDetails[0][2] . "</span></h4>";
                    echo "<p>" .
                        $mealDetails[0][5]
                        . "</p>";
                    echo "<i class='bx bx-cart-alt'>Remove</i>";
                    echo '<lablell class="quant">Quantity </label><input type=number value=' . $mealDetails[1] . " min=1>";
                    echo "</div></div>";
                }
                ?>
            </div>

        <?php }
        if (isset($drink)) { ?>
            <nav class="navbar navbar-expand-lg navbar-dark navcolor">Drinks</nav>
            <h2 id="drink" class="lead text-monospace"></h2>
            <div class="single-menu row">
                <?php
                foreach ($drink as $key => $mealDetails) {
                    echo "<div class='col-12 col-md-6'>";
                    echo "<img src='imagesMenu/" . $mealDetails[0][4] . "' alt='' class='img-fluid' />";
                    echo "<div class='menu-content'>";
                    echo "<h4>" . $mealDetails[0][1] . "<span>BD " . $mealDetails[0][2] . "</span></h4>";
                    echo "<p>" .
                        $mealDetails[0][5]
                        . "</p>";
                    echo "<i class='bx bx-cart-alt'>Remove</i>";
                    echo '<lablell class="quant">Quantity </label><input type=number value=' . $mealDetails[1] . " min=1>";
                    echo "</div></div>";
                }
                ?>
            </div>
        <?php }
        echo "<h4><span class'totalPrice'>Total price = BD 0</span></h4>";
        echo "<h4>Delivery charge = 1BD</h4>";
        echo "<a href=placeOrder.php><button name='placeOrder' type='submit''>Place Order</button></a>";
        }
        if (!isset($_COOKIE['cart'])) echo "<h2 class='noItem alert alert-danger m-5 font-weight-bold bg-dark text-danger'>No item has been added to cart</h2>";
        ?>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="cart.js"></script>
</body>

</html>