<?php
extract($_POST);
require('connection.php');
if (isset($changeRole)) {
    $sql = "UPDATE `users` SET `role`= '" . $newRole . "' WHERE email = '" . $usersEmail . "'";
    $req = $db->query("$sql");
} else if (isset($updateMenu)) {
    if (isset($deleteItem)) {
        $sql = "DELETE FROM `menu` WHERE `name` = '" . $foodName . "'";
        $req = $db->query($sql);
    } else {
        $sql = "SELECT `name`, `price`, `Description` FROM `menu` WHERE  `name` = '" . $foodName . "'";
        $req = $db->query($sql);
        $row = $req->fetch();
        if ($newName == "") {
            $newName = $row[0];
        }
        if ($newPrice == "") {
            $newPrice = $row[1];
        }
        if ($newDescription == "") {
            $newDescription = $row[2];
        }
        $sql = "UPDATE menu SET `name` = '" . $newName . "', `price` = '" . $newPrice . "', `Description` =  '" . $newDescription . "' WHERE  `name` = '" . $foodName . "'";
        $req = $db->query($sql);
    }
} else if (isset($addItem)) {
    $sql = "INSERT INTO `menu`(`id`, `name`, `price`, `type`, `pic`, `Description`) VALUES (NULL ,'" . $addName . "', $addPrice ,'" . $addType . "','" . $addPic . "','" . $addDescription . "')";
    $req = $db->query($sql);
}

header('Location: adminView.php');
