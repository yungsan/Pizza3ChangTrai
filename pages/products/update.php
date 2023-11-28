<?php
require_once('../../config/database.php');
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
$address = $_POST['address'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE users 
        SET username = '$username', email = '$email', sdt = '$sdt', address = '$address' 
        WHERE id = $user_id";

if ($connect->query($sql)) {
    echo "Cập nhật thông tin thành công";
} else {
    echo "Error updating record: " . $connect->error;
}


?>