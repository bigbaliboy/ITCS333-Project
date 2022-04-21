<?php
session_start();
// if (isset($_SESSION['Customer'])) {
//     header('Location: index.php');
// }

// if (!isset($_SESSION['login'])) {
//     header('Location: signIn.php');
// }

// if (!isset($_SESSION['login'])) {
//     header('Location: signIn.php');
// }
// if (isset($_SESSION['Admin']) || isset($_SESSION['Staff'])) {
// } else {
//     header('Location: index.php');
// }
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
        html {
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

    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <!-- MENU -->
    <div class="menu-class">
        <div class="title glow center">
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
    $sql = "SELECT * FROM `orders` where `Status` not like 'Done'";
    $row = $db->query($sql)->fetchAll();
    if (count($row) == 0) {
        echo "<h2 class='alert alert-danger m-5 font-weight-bold bg-dark text-danger'>YOU HAVE NO ORDERS TO VIEW</h2>";
    }
    $retriveOrderItems = $db->prepare("Select * FROM orderitems where orderNumber = ?");
    // $retriveOrderItems->bindParam('?', $orderNum);

    echo "<div class='container mb-2'>";

    foreach ($row as $key => $order) {
        $price = 0;
        $orderNum = $order[0];
        $orderStatus = $order[4];
        // $string= 

        echo "<div class='row flex center mt-5 mb-2'>";
        echo "<div class='orders'>";
        echo "<br><h2 class='center m-2'>ORDER NUMBER " . $orderNum . ":\n </h2><br>";
        echo "<div class='col-12'><h4>STATUS: " . $order[4] . "</h4></div>";
        $retriveOrderItems->execute([$orderNum]);
        while ($details = $retriveOrderItems->fetch()) {
            echo "<div class='col-12'><h3>\n" . ucwords($details[1]) . ": " . $details[2] . " Pc(s) \n</h3></div>";


            // $details=$retriveOrderItems->fet;
            // echo $details; 
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
        echo "<div class='col-12'><h4>PRICE: BD " . $price . "</h4></div>";
        // echo "<div class='col-12'><h4>STATUS: " . $order[4] . "</h4></div>";
        echo "<form method='Post' action='saveStatus.php'>";
        echo "<input value='Waiting For Confirmation' type='radio' name='check'/>Waiting For Confirmation <br>";
        echo "<input value='Acknowledged' type='radio' name='check'/>Acknowledged <br>";
        echo "<input value='Preparing' type='radio' name='check'/>Preparing <br>";
        echo "<input value='Out For Delivery' type='radio' name='check'/>Out For Delivery <br>";
        echo "<input value='Done' type='radio' name='check'/>Done <br>"; ?>
        <input type='hidden' name='orderNum' value='<?php echo "$orderNum"; ?>' />
        <input type='submit' action='saveStatus.php' name='btn' value='Save Changes' class='m-2 btn btn-danger' />
<?php
        // echo "<input type='submit' action='saveStatus.php' name='btn' value='Save Changes'/>";
        echo "</form>";
        echo "<input type='hidden' name=orderID value='" . $orderNum . "'></input>";
        echo "</div>";
        echo "</div>";
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

    for (i = 0; i < orders.length; i++) {
        if (orders[i].offsetWidth > maxWidth) {
            maxWidth = orders[i].offsetWidth;
        }
    }

    Array.from(orders).forEach(function(element) {
        element.style.height = `${maxHeight}px`;
        element.style.width = `${maxWidth}px`;
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>