<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: signIn.php');
}
?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mohave&display=swap" rel="stylesheet">

<!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Mohave&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

<!-- fatema -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body{
    overflow-x: hidden;
}
</style>
</head>

<link rel="stylesheet" href="css-reset.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="aboutusstyles.css" />

<body>
<header class="home-burger">
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
    <div class="au-container mt-4">

        <!-- <div class="au-margin">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div> -->

        <div class="row au-main">
            <h1 class="align-self-center text-center my-auto">
                ABOUT US
            </h1>
        </div>
        <div class="au-bg img-fluid">

            <div class="row au-cards">
                <div class="col-lg-7 col-md-7 col-sm-12 text-left justify text-white ourStory" id="card1">
                    <h3> Our Story </h3>
                    <h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </h5>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12" id="card2">
                </div>

            </div>
            <div class="row">
                <h2 class='small-heading'>Why Us? </h2>
            </div>
              <div class="row au-cards au-features justify-content-center text-white">
                <div class="col-lg-4 col-md-6 col-sm-12 au-feature-card">
                    <img class="rounded-circle img-fluid au-card-imgs" src="images/au-quality-card.jpg" alt="Quality Food" id='au-quality-img'>
                    <h3>Excellent Quality</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 au-feature-card">
                    <img class="rounded-circle img-fluid au-card-imgs" src="images/au-taste-card.jpg" alt="Quality Food" id='au-quality-img'>
                    <h3>Unbelievable Taste</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 au-feature-card" id="last-feature">
                    <img class="rounded-circle img-fluid au-card-imgs" src="images/au-experience-card.jpg" alt="Quality Food" id='au-quality-img'>

                    <h3>Experienced staff</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>


            <!-- fatema's part -->
            <div class="staff-part-body">

                <div class="container">
                    <div class="row">
                        <h2 class='small-heading'>Meet Our Team</h2>
                    </div>
                    <div class="row justify-content-center staff-box pt-5">
                        <div class="col-3 card staff-card1" style="width: 18rem;">
                            <div class="staff-img img-fluid">
                                <img src="images\staff1.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body body1">
                                <div class="about">
                                    <h3 class="card-title">Chef name</h5>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <!-- <a href="#" class="btn">Order Status</a> -->
                            </div>
                        </div>



                        <div class="col-3 card staff-card2 justify-content-center" style="width: 18rem;">
                            <div class="staff-img img-fluid">
                                <img src="images\staff2.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body body2">
                                <div class="about">
                                    <h3 class="card-title title">Chef name</h5>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <!-- <a href="#" class="btn">Order Status</a> -->
                            </div>
                        </div>


                        <div class="col-3 card staff-card3" style="width: 18rem;">
                            <div class="staff-img img-fluid">
                                <img src="images\staff3.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body body3">
                                <div class="about">
                                    <h3 class="card-title title">Chef name</h5>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <!-- <a href="#" class="btn">Order Status</a> -->
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="au-margin"></div>
        </div>
    </div>





    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>