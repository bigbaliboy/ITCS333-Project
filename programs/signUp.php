<?php
require('connection.php');
extract($_POST);
$namesPattern = '/^[a-zA-Z]{3,20}$/';
$emailPattern = '/^([a-zA-Z][\w\_\.]{6,15})\@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,4})$/';
$passwordPattern = '/^\w*[a-z]\w*[A-Z]\w*[0-9]\w*|\w*[a-z]\w*[0-9]\w*[A-Z]\w*|\w*[A-Z]\w*[a-z]\w*[0-9]\w*|\w*[A-Z]\w*[0-9]\w*[a-z]\w*|\w*[0-9]\w*[A-Z]\w*[a-z]\w*|\w*[0-9]\w*[a-z]\w*[A-Z]\w*$/';
// $passwordPattern = '/^([a-zA-Z]{4,}[0-9]{2,}){8,}$/';
// [!@#$%^&*()\-__+.]{0,}
$phonePattern = '/^[0-9]{8}$/';

if (isset($email) && isset($password) && isset($firstName) && isset($lastName) && isset($confirmPassword) && isset($mobilePhone)) {
    $wrongInputs = 0;
    if (!preg_match($namesPattern, $firstName)) {
        $wrongInputs++;
    }
    if (!preg_match($namesPattern, $lastName)) {
        $wrongInputs++;
    }
    if (!preg_match($emailPattern, $email)) {
        $wrongInputs++;
    }
    if (!preg_match($passwordPattern, $password)) {
        $wrongInputs++;
    }
    if ($password != $confirmPassword) {
        $wrongInputs++;
    }
    if (!preg_match($phonePattern, $mobilePhone)) {
        $wrongInputs++;
    }
    if ($wrongInputs == 0) {
        $db->beginTransaction();
        try {
            $sqlConfirm = "SELECT * FROM `users` WHERE email= '" . $email . "'";
            $req = $db->query($sqlConfirm);
            if ($row = $req->fetch()) {
                header("Location: signUp2.php?errorEmail=Email is taken already");
            } else {
                $query = $db->prepare("INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `mobileNumber`, `role`) VALUES (?,?,?,MD5(?),?,?)");
                $query->execute(array($firstName, $lastName, $email, $password, $mobilePhone, "Customer"));
                $db->commit();
                $_SESSION['login'] = $email;
                $_SESSION['Customer'] = "Customer";
                header("Location: index.php");
            }
        } catch (PDOException $error) {
            $db->rollBack();
            echo $error->getMessage();
        }
    }
}
require('signUp2.php');
