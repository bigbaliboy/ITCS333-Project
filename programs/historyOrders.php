<?php
session_start();
extract($_POST);
require('connection.php');

if (isset($reorderBtn)) {
    
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
    <link rel="stylesheet" href="style.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="staffView.css" />
        <style>
        html{
         background-color: transparent;
        }
      body{
        height: 100%;
        background-repeat: no-repeat;
         background-size: cover;
        opacity: 0.7;
        background-position: center;
        background-attachment: fixed;
      }
    </style>
</head>

<body>
    <!-- MENU -->
    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <div class="menu-class">
        <div class="title glow">
            <h4 class="font-weight-bold text-monospace" style="font-size: 50px;">
                <span class="font-italic"></span>HISTORY ORDERS
            </h4>
        </div>


    </div>
    </nav>
    </div>
</body>

<?php
try {
    $sql = "SELECT * FROM `orders` WHERE `Status` LIKE 'Done' AND `customerEmail`= '" . $_SESSION['login'] . "'";
    $row = $db->query($sql)->fetchAll();
    if (count($row) == 0) {
        echo "<h2 class='alert alert-danger m-5 font-weight-bold bg-dark text-danger '>YOU HAVE NO ORDERS TO VIEW</h2>";
    }
    $retriveOrderItems = $db->prepare("Select * FROM orderitems where orderNumber = ?");
    // $retriveOrderItems->bindParam('?', $orderNum);

    echo "<div class='container mb-2'>";
    foreach ($row as $key => $order) {

        echo "<div class='row flex center mt-5 mb-2'>";
        echo "<div class='orders'>";
        echo "<br><h2 class='center ml-1'>ORDER NUMBER " . $order[0] . ":\n </h2><br>";
        echo "<form method='POST' action='reOrder.php'>";
        $price = 0;
        $orderNum = $order[0];
        $orderStatus = $order[4];
        // $string= 

        echo "<div class='row center ml-1'>";
        // echo "<br><h1 class='center'>ORDER NUMBER " . $orderNum . ":\n </h1><br>";
        $retriveOrderItems->execute([$orderNum]);
        $myArray = array();
        $quantity = array();
        $name = array();
        while ($details = $retriveOrderItems->fetch()) {
            echo "<div class='col-12'><h3>\n" . ucwords($details[1]) . ": " . $details[2] . " Pc(s) \n</h3></div>";

            $sqlName = "SELECT `price` FROM `menu` WHERE `name` = '" . $details[1] . "'";
            $name[] = $details[1];
            $quantity[] = $details[2];
            $sqlQuan = "SELECT * FROM `orderitems` WHERE `orderNumber` = $order[0]";
            $reqQuan = $db->query($sqlQuan);
            $rowQuan = $reqQuan->fetch();
            // echo $rowQuan[2];
            $reqName = $db->query($sqlName);
            $rowName = $reqName->fetch();
            // echo $rowName[0];
            $price += $rowName[0] * $rowQuan[2];
            $myArray[] = "$details[1]:$details[2]";
        }
        echo "<div class='col-12'><h4>PRICE: BD " . $price . "</h4></div>";
        // echo "<div class='col-12'><h4>STATUS: " . $order[4] . "</h4></div>";

        // setCookie('cart', json_encode());
        // echo "<a href=showCart.php><button name='placeOrder' value='' type='submit''>Place Order</button></a>";
        $name = json_encode($name);
        $quantity = json_encode($quantity);
        echo "<input type='hidden' name='name' value='$name'>";
        echo "<input type='hidden' name='quantity' value=$quantity>";
        // echo "<input type='submit' name='reorderBtn' value='Re-Order'>";
        echo "<input type='submit' name='reorderBtn' value='Re-Order' class='m-2 btn btn-danger' />";

        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<br><br><br><br><br>";
    }
    echo "</div>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<script>
    const orders = document.querySelectorAll('.orders');
    let maxHeight = 0;
    let maxWidth = 0;

    for (i = 0; i < orders.length; i++) {
        if (orders[i].offsetHeight > maxHeight) {
            maxHeight = orders[i].offsetHeight;
        }
    }

    // for (i = 0; i < orders.length; i++) {
    //     if (orders[i].offsetWidth > maxWidth) {
    //         maxWidth = orders[i].offsetWidth;
    //     }
    // }

    Array.from(orders).forEach(function(element) {
        element.style.height = `${maxHeight}px`;
        element.style.width = `557px`;
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>