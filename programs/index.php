<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: signIn.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Three guys</title>
    <link rel="stylesheet" href="css-reset.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
        <style>
      body{
        height: 100%;
        background-repeat: no-repeat;
         background-size: cover;
        background-position: center;
        background-attachment: fixed;
      }
    </style>
</head>

<body>
    <header class="home-burger">
        <div class="container">
            <?php require('mainNav.php'); ?>
        </div>
        <div class="main-text img-fluid">
            <h1>EAT BETTER BURGERS</h1>
            <h3 class="d-none d-md-block mt-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nam voluptatibus eius debitis nesciunt minus numquam qui reprehenderit accusamus corporis
            </h3>
        </div>
        <br />
        <br />
        <div>
            <a href="showMenu.php" class="order_online btn btn-first ml-5 m-3 text-center">ORDER NOW</a>
            <a href="https://www.youtube.com/watch?v=7_kksnscs0Y"  target="_blank" class="order_online btn btn-second ml-5 m-3 text-center">WATCH VIDEO
            </a>
        </div>
    </header>

    <footer>
        <div class="footer">
            <div class="location footer-part">
                <h2>Our location</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <p>Lorem ipsum dolor sit ******.</p>
            </div>
            <div class="hours footer-part">
                <h2>Opening Hours</h2>
                <p>Monday to Sunday</p>
                <p>9:00 AM - 10:00 PM</p>
            </div>
            <div class="contact footer-part">
                <h2>Contact Us</h2>
                <p>91 9999 999 ***</p>
                <p>info@gmail.com</p>
                <div class="center">
                    <div class="center social">
                        <a href="#" data-text="Whatsapp"><i class="fab fa-whatsapp fa-2x"> </i></a>
                        <a href="#" data-text="Instagram"><i class="fab fa-instagram fa-2x"> </i></a>
                        <a href="#" data-text="Facebook"><i class="fab fa-facebook fa-2x"> </i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>