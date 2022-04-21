<?php
try{
    require('connection.php');
    extract($_POST);
    echo $orderNum;
    echo $check;
    $db->beginTransaction();
    $updateStatus=$db->prepare("Update orders set Status=:check where orderNumber=:orderID");
    $updateStatus->bindParam(':check', $check);
    $updateStatus->bindParam(':orderID', $orderNum);
    $updateStatus->execute();
    $db->commit();
    $db=null;
    header('Location: staffView.php');
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>