<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: signIn.php');
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
        nav{
            color: white;
        }
        i:hover {
            color: white;
        }
    </style>

</head>

<body>
    <!-- MENU -->
    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <div class="container menu-class mt-5">
        <div class="title">
            <h4 class="font-weight-bold text-monospace">
                <span class="font-italic">Tasty menu of the week</span>our menu
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

        <!-- Burger -->
        <!-- <nav class="navbar navbar-expand-lg navbar-dark navcolor"> Burger</nav> -->
        <h2 id="burger" class="lead text-monospace"></h2>

        <div class="menu">
            <!-- <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger1.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger2.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
            </div>

            <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger3.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger4.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
            </div>

            <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger5.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/Burger6.PNG" alt="" class="img-fluid" />
                    <div class="menu-content mt-2">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
            </div>

            snak -->
            <!-- <h2 id="snaks" class="lead text-monospace">SNACKS</h2>
            <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/snacks1.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/snacks2.PNG" alt="" class="img-fluid" />
                    <div class="menu-content mt-2">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
            </div> -->

            <!-- SALAD -->
            <!-- <h2 id="salad" class="lead text-monospace">SALAD</h2>
            <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/salad1.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/salad2.PNG" alt="" class="img-fluid" />
                    <div class="menu-content mt-2">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
            </div> -->

            <!-- Drink -->
            <!-- <h2 id="drink" class="lead text-monospace">DRINK</h2>
            <div class="single-menu row">
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/drink.PNG" alt="" class="img-fluid" />
                    <div class="menu-content">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="imagesMenu/drink2.PNG" alt="" />
                    <div class="menu-content mt-2">
                        <h4>Three Guys Burger <span>$45</span></h4>
                        <p>
                            Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis.
                        </p>
                        <i class="bx bx-cart-alt"></i>
                    </div>
                </div> -->
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="menu.js"></script>
</body>

</html>