<?php
require_once('../../config/database.php');
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
$address = $_POST['address'];
$fullname = $_POST['fullname'];
$id = $_SESSION['user']['id'];

$sql = "UPDATE users 
        SET username = '$username', fullname = '$fullname', email = '$email', sdt = '$sdt', address = '$address' 
        WHERE id = $id";

if ($connect->query($sql)) {
    $_SESSION['user']['username'] = $username;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['sdt'] = $sdt;
    $_SESSION['user']['address'] = $address;
    $_SESSION['user']['fullname'] = $fullname;
    echo "Cập nhật thông tin thành công";
} else {
    echo "Error updating record: " . $connect->error;
}


?>