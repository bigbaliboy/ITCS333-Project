<?php
session_start();
require('connection.php');
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
    height: 100%; 
    scroll-behavior: smooth;
     background-color: transparent;
     }
          body {
            background-image: url('images/au-bg3.jpg');
            background-size: cover;
            /* background-repeat: no-repeat; */
            background-repeat:repeat-y;
            background-position: center;
            background-attachment: fixed;
            /* background-attachment: scroll; */
             /* background-color: rgba(255, 255, 255, .4); */
            
        }

        p,
        h4 {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <!-- MENU -->
    <div class="menu-class">
        <div class="title glow">
            <h4 class="font-weight-bold text-monospace" style="font-size: 50px;">
                <span class="font-italic"></span>ACTIVE ORDERS
            </h4>
        </div>


    </div>
    </nav>
    </div>
</body>

<?php

try {
    require('connection.php');
    // echo "<div class='container'>";
    $sql = "SELECT * FROM `orders` WHERE `Status` NOT LIKE 'Done' AND `customerEmail`= '" . $_SESSION['login'] . "'";
    $row = $db->query($sql)->fetchAll();
    if (count($row) == 0) {
        echo "<h2 class='alert alert-danger m-5 font-weight-bold bg-dark text-danger'>YOU HAVE NO ORDERS TO VIEW</h2>";
    }
    $retriveOrderItems = $db->prepare("Select * FROM orderitems where orderNumber = ?");
    // $retriveOrderItems->bindParam('?', $orderNum);
    $count = 0;
    echo "<div class='container mb-2'>";
    foreach ($row as $key => $order) {
        $count++;
        $price = 0;
        $orderNum = $order[0];
        $orderStatus = $order[4];
        // $string= 
        echo "<div class='row flex center mt-5 mb-2'>";
        echo "<div class='orders'>";
        // echo "<div class=row center>";
        echo "<br><h2 class='center m-2'>ORDER NUMBER " . $orderNum . ":\n </h2><br>";
        echo "<div class='col-12'><h4>STATUS: " . $order[4] . "</h4></div>";
        $retriveOrderItems->execute([$orderNum]);
        echo "<div class='row center ml-1'>";
        while ($details = $retriveOrderItems->fetch()) {
            echo "<div class='col-12'><h3>\n" . ucwords($details[1]) . ": " . $details[2] . " Pc(s) \n</h3></div>";

            $sqlName = "SELECT `price` FROM `menu` WHERE `name` = '" . $details[1] . "'";
            $sqlQuan = "SELECT * FROM `orderitems` WHERE `orderNumber` = $order[0]";
            $reqQuan = $db->query($sqlQuan);
            $rowQuan = $reqQuan->fetch();
            // echo $rowQuan[2];
            $reqName = $db->query($sqlName);
            $rowName = $reqName->fetch();
            // echo $rowName[0];
            $price += $rowName[0] * $rowQuan[2];
        }
        echo "<div class='col-12'><h4>PRICE: BD " . $price . " + 1BD for delivery</h4></div>";
        $price = $price + 1;
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<br><br><br><br><br>";
    }
    echo "</div>";
    if (isset($orderNum)) {
    $sql = "UPDATE `orders` SET `Total`=". $price ." WHERE `orderNumber`=" . $orderNum;
    $db->query($sql);
    }
    // echo "</div>";
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

    Array.from(orders).forEach(function(element) {
        element.style.height = `${maxHeight}px`;
        element.style.width = `557px`;
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>