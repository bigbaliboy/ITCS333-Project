<?php
session_start();
require('connection.php');
if (!isset($_SESSION['login'])) {
  header('Location: signIn.php');
}
if (isset($_SESSION['Admin'])) {
} else {
  header('Location: index.php');
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin View</title>
  <link rel="stylesheet" href="css-reset.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  <link rel="stylesheet" href="adminView.css" />
  <link rel="stylesheet" href="style.css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>

  <div class="container">
    <?php require('mainNav.php') ?>
  </div>

  <div id="mySidenav" class="sidenav mt-3 d-none d-md-block">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#CR">Changing Role</a>
    <a href="#change">Update Menu</a>
    <!-- <a href="#delete">:: DELETING</a> -->
    <a href="#add">:: ADDING</a>

  </div>

  <div id="main">
    <nav class="navbar navbar-dark bg-dark">
      <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; Admin Control Panel</span>
      <!-- <form class="form-inline">
   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
 </form> -->
    </nav>


    <!-- <h1>TO CHANGE ROLE</h1> -->
    <div class="bg-dark m-4">
      <form action="adminLogic.php" method='POST'>
        <div class="card card-6 m-2 text-sm-center text-lg-left  text-uppercase">
          <div class="card-body">
            <p id="CR"></p>
            <label for="usersEmail" class="">
              <h5>Enter user's email:</h5>
            </label>
            <div class="btn-group">
              <select name="usersEmail" id="usersEmail" class="btn btn-Secondary text-left" required>
                <?php
                $count = 0;
                $sql = "SELECT `email` FROM `users` WHERE 1";
                $req = $db->query($sql);
                while ($row = $req->fetch()) {
                  $count++;
                  echo "<option value='$row[0]'> $row[0] </option> ";
                }
                ?>
              </select>
            </div>
            <br>
            <br>
            <label for="usersEmail">
              <h5>New Role:</h5>
            </label>
            <div class="btn-group">
              <select name="newRole" id="newRole" class="btn btn-Secondary text-left" required>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
                <option value="Customer">Customer</option>
              </select>
            </div>
            <br>
            <br>
            <input type="submit" value="Change role" name="changeRole" class="m-2 btn btn-danger">
          </div>
        </div>
      </form>
    </div>

    <div class="bg-dark m-4 ">
      <div class="card card-6 m-2 text-sm-center text-lg-left text-uppercase ">
        <!-- <h1>TO CHANGE TO MENU</h1> -->
        <h2></h2>
        <div class="card-body">
          <!-- bg-blue -->
          <form action="adminLogic.php" method='POST' class="">
            <label for="foodName">
              <h5 id="change">Enter the name:</h5>
            </label>
            <div class="btn-group">
              <select name="foodName" id="foodName" class="btn btn-Secondary text-left" required style="width: 100%">
                <?php
                $count = 0;
                $sql = "SELECT * FROM `menu` WHERE 1";
                $req = $db->query($sql);
                while ($row = $req->fetch()) {
                  $count++;
                  echo "<option value='$row[1]' required> $row[1] </option> ";
                }
                ?>
              </select>
            </div>
            <br>
            <br>
            <label for="newName">
              <h6>Enter new name:</h6>
            </label>
            <input type="text" id="newName" name="newName" placeholder="Name" >
            <br>
            <br>
            <label for="newPrice">
              <h6>Enter new price: </h6>
            </label>
            <input type="text" id="newPrice" name="newPrice" placeholder="Price" >
            <br>
            <br>
            <label for="newDescription">
              <h6>Enter new Description: </h6>
            </label>
            <input type="text" id="newDescription" name="newDescription" placeholder="Description">
            <br>
            <br>

            <small>*Leave empty if dont want to change</small>
            <br>
            <!-- <p id="delete"></p> -->
            <input type="checkbox" id="deleteItem" value="Delete Item" name="deleteItem">
            <label for="deleteItem">
              <h6>DELETE ITEM </h6>
            </label>
            <br>
            <br>
            <input type="submit" value="Update Menu" name="updateMenu" class="m-2 btn btn-primary">
            <br>
          </form>
        </div>
      </div>
    </div>




    <div class="bg-dark m-4 ">
      <div class="card card-6 m-2 text-sm-center text-lg-left text-uppercase ">
        <!-- <h1>TO ADD TO MENU</h1> -->
        <br>
        <div class="card-body">
          <form action="adminLogic.php" method='POST'>
            <label for="addName">
              <h6 id="add">New Item Name</h6>
            </label>
            <input type="text" name="addName" id="addName">
            <br>
            <label for="addPrice">
              <h6>New Item Price</h6>
            </label>
            <input type="text" name="addPrice" id="addPrice">
            <br>
            <label for="addType">
              <h6>New Item Type</h6>
            </label>
            <div class="btn-group">
              <select name="addType" id="addType" class="btn btn-Secondary text-left">
                <option value="Burger">Burger</option>
                <option value="Snack">Snack</option>
                <option value="Salad">Salad</option>
                <option value="Drink">Drink</option>
              </select>
            </div>
            <br>
            <label for="addPic">
              <h6>New Item Image</h6>
            </label>
            <input type="text" name="addPic" id="addPic">
            <br>
            <label for="addDescription">
              <h6>New Item Description</h6>
            </label>
            <input type="text" name="addDescription" id="addDescription">
            <br>
            <input type="submit" value="Add Item" name="addItem" class="m-2 btn btn-primary">
          </form>
        </div>
      </div>
    </div>

    <div class=" text-center justify-content-center w-50 p-4 mx-auto" style="width: 200px;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img class="centerImg" src="images\adminburger.jpg" alt="advice1" style="width:300px;height:300px;">
          </div>
          <div class="flip-card-back">
            <img class="centerImg" src="images\advice.jpg" alt="advice" style="width:300px;height:300px;">
          </div>
        </div>
      </div>

    </div>

  </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.body.style.backgroundColor = "white";
    }
  </script>

</body>

</html>