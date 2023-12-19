<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "pizza3changtrai";

$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$connect->set_charset("utf8");

?>