<?php
session_start();
extract($_POST);
if (isset($_POST)) {
    require('connection.php');
    extract($_POST);
    $emailPattern = '/^([a-zA-Z][\w\_\.]{6,15})\@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,4})$/';
    $passwordPattern = '/^\w*[a-z]\w*[A-Z]\w*[0-9]\w*|\w*[a-z]\w*[0-9]\w*[A-Z]\w*|\w*[A-Z]\w*[a-z]\w*[0-9]\w*|\w*[A-Z]\w*[0-9]\w*[a-z]\w*|\w*[0-9]\w*[A-Z]\w*[a-z]\w*|\w*[0-9]\w*[a-z]\w*[A-Z]\w*$/';
    $emailEr = false;
    $passwordEr = false;
    $wrongInputs = 0;
    if (isset($email) && isset($password)) {
        if (!preg_match($emailPattern, $email)) {
            $emailEr = true;
            $wrongInputs++;
        }
        if (!preg_match($passwordPattern, $password)) {
            $passwordEr = true;
            $wrongInputs++;
        }
        // if ($emailEr && $passwordEr) {
        //     header("Location:signIn2.php?e=Email Is Incomplete&p=Password Is Incomplete");
        // } else if ($emailEr && !$passwordEr) {
        //     header("Location:signIn2.php?e=Email Is Incomplete");
        // } else if (!$emailEr && $passwordEr) {
        //     header("Location:signIn2.php?p=Password Is Incomplete");
        // }
        if ($wrongInputs == 0) {
            try {
                // $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM `users` WHERE email= '" . $email . "' AND PASSWORD=MD5('" . $password . "')";
                $req = $db->query($sql);
                if ($row = $req->fetch()) {
                    if ($row[5] == "Admin") {
                        $_SESSION['Admin'] = "Admin";
                        $_SESSION['login'] = $email;
                        header("Location: index.php");
                    } else if ($row[5] == "Staff") {
                        $_SESSION['Staff'] = "Staff";
                        $_SESSION['login'] = $email;
                        header("Location: index.php");
                    } else if ($row[5] == "Customer") {
                        $_SESSION['Customer'] = "Customer";
                        $_SESSION['login'] = $email;
                        header("Location: index.php");
                    }
                } else {
                    header("Location:signIn2.php?passWrong=Credentials Are Invalid");
                }
            } catch (PDOException $error) {
                $error->getMessage();
            }
        }
    }
}
require('signIn2.php');
