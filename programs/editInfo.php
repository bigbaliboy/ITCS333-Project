<?php
session_start();
require('connection.php');
extract($_POST);

if (!isset($_SESSION['login'])) {
    header('Location: signIn.php');
}

if (isset($showProfile)) {
    header('Location: showProfile.php');
}

$passwordPattern = '/^\w*[a-z]\w*[A-Z]\w*[0-9]\w*|\w*[a-z]\w*[0-9]\w*[A-Z]\w*|\w*[A-Z]\w*[a-z]\w*[0-9]\w*|\w*[A-Z]\w*[0-9]\w*[a-z]\w*|\w*[0-9]\w*[A-Z]\w*[a-z]\w*|\w*[0-9]\w*[a-z]\w*[A-Z]\w*$/';
$phonePattern = '/^[0-9]{8}$/';

if (isset($editInfo)) {
    $oldPassword = trim($oldPassword);
    $newPassword = trim($newPassword);
    $wrongInputs = 0;
    $sql = "SELECT * FROM `users` WHERE email= '" . $_SESSION['login'] . "'";
    $req = $db->query($sql);
    $row = $req->fetch();
    if ($newPassword == '' && $oldPassword == '') {
        $sql = "UPDATE `users` SET `mobileNumber`= $newPhone WHERE email= '" . $_SESSION['login'] . "'";
        $req = $db->query($sql);
    } else if (MD5($oldPassword) == $row[3]) {

        if (!preg_match($passwordPattern, $newPassword)) {
            $wrongInputs++;
        }
        if (!preg_match($phonePattern, $newPhone)) {
            $wrongInputs++;
        }
        if ($wrongInputs == 0) {
            $sql = "UPDATE `users` SET `password`= MD5('" . $newPassword . "') WHERE email= '" . $_SESSION['login'] . "'";
            $req = $db->query($sql);
            $sql = "UPDATE `users` SET `mobileNumber`= $newPhone WHERE email= '" . $_SESSION['login'] . "'";
            $req = $db->query($sql);
        }
    }
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
    <link rel="stylesheet" href="editInfo.css">
</head>

<body>
    <div class="container">
        <?php require('mainNav.php'); ?>
    </div>
    <div class="container mt-3">
        <div class="row align-content-center">
            <div class="col">
                <form action="editInfo.php" method="POST">
                    <div class="profile d-flex justify-content-center align-content-center ">
                        <div class="card profileCard d-flex justify-content-center align-content-center">
                            <div class="card-body pBody">
                                <form action="">
                                    <div class="header">
                                        <?php
                                        $sql = "SELECT * FROM `users` WHERE email= '" . $_SESSION['login'] . "'";
                                        $req = $db->query($sql);
                                        $row = $req->fetch();

                                        echo " <img src='images/profilePic.png' alt=' class='profileImg'>";
                                        echo "</div>";
                                        echo "<h5 class='card-title profileTitle'>$row[0] $row[1]</h5>";
                                        echo "<input type='text' name='newPhone' id='' value='$row[4]' placeholder='Phone number' class='phone'>";
                                        echo "<input type='password' name='oldPassword' id='' placeholder='Old Password' class='passwordIn'>";
                                        echo "<input type='password' name='newPassword' id='' placeholder='New Password' class='passwordIn'>";
                                        ?>
                                        <!-- <p class="email">exampleEmail@123.com</p> -->
                                        <!-- <p class="phone">+973 33762460</p> -->
                                        <!-- <p> <a href="#" class="changePass">Change password?</a></p> -->
                                        <div class="cardFooter mt-3">
                                            <p class="pButton">
                                                <input type="submit" name="showProfile" value="Show My Profile" class="signOut" />
                                            </p>
                                            <hr style="height: 4px">
                                            <!-- <form action="editInfo.php" method="POST">
                                            <input type="submit" name="editInfo" value="Edit Your Informations"
                                                class="editInfo" />
                                        </form> -->
                                            <input type="submit" name="editInfo" value="Submit" class="submitInfo">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- <script src="showProfile.js"></script> -->
    <script>
        const input = document.querySelector('.passwordIn');
        input.style.marginBottom = "6px";
    </script>
</body>

</html>