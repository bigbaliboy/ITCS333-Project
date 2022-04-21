<?php
session_start();
require('connection.php');
extract($_POST);

if (!isset($_SESSION['login'])) {
    header('Location: signIn.php');
}


if (isset($editInfoBtn)) {
    // require('editInfo.html');
    header('Location: editInfo.php');
}

if (isset($signOut)) {
    session_destroy();
    header('Location: signIn.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YOUR PROFILE</title>
    <link rel="stylesheet" href="css-reset.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="showProfile.css">

    <!-- <style>
        .profileCard {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: center;
        }
    </style> -->

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <img class="logo d-none d-lg-block" src="images/threeGuysLogo.jpg" width="30" height="30" alt="" loading="lazy" />
                            <!-- <img class="logo d-none d-lg-block" width="30" height="30" alt="" loading="lazy" /> -->
                        </a>
                    </li>
                </ul>
                <div class="right-side-nav">
                    <ul class="navbar-nav navbar-left">
                        <li class="nav-item mt-1 ml-lg-3 mt-lg-3">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="about.php">About</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="showMenu.php">Menu</a>
                        </li>
                        <?php
                        if (isset($_SESSION['Admin']) || isset($_SESSION['Staff']))
                            echo " <li class='nav-item mt-lg-3'> <a class='nav-link active' href='staffView.php'>STAFF</a> </li> ";
                        if (isset($_SESSION['Admin']))
                            echo " <li class='nav-item mt-lg-3'> <a class='nav-link active' href='adminView.php'>ADMIN</a> </li> ";
                        ?>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="myOrders.php">My Orders</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="historyOrders.php">History Orders</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link" href="showCart.php">
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link" href="showProfile.php">
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-3">
        <div class="column">
            <div class="row center">
                <form method="POST">
                    <div class="profile">
                        <div class="card profileCard">
                            <div class="card-body pBody">
                                <div class="header">
                                    <?php
                                    $sql = "SELECT * FROM `users` WHERE email= '" . $_SESSION['login'] . "'";
                                    $req = $db->query($sql);
                                    while ($row = $req->fetch()) {
                                        // echo json_encode(array($row[0], $row[1], $row[2], $row[4]));


                                        echo "<img src='images/profilePic.png' alt='' class='profileImg'>";
                                        echo "</div>";
                                        echo "<h5 class='card-title profileTitle'>$row[0] $row[1]</h5>";
                                        echo "<p class='email'>$row[2]</p>";
                                        echo "<p class='phone'>$row[4]</p>";
                                    }
                                    ?>
                                    <div class="cardFooter">
                                        <form method="POST">
                                            <input type="submit" name="editInfoBtn" value="Edit Your Informations" class="editInfo" />
                                        </form>
                                        <hr style="height: 4px">
                                        <p class="pButton">
                                            <input type="submit" name="signOut" value="Sign Out" />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>


    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="showProfile.js"></script>
</body>

</html>