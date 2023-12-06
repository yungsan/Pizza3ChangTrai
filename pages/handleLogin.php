<?php
require_once("../config/database.php");
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT *
        FROM users 
        WHERE 
            username = '$username' AND 
            password = '$password'";

$products = $connect->query($sql);

if ($products->num_rows == 0) {
    echo "dang nhap that bai";
} else {
    $product = $products->fetch_assoc();
    session_start();
    $_SESSION["user"] = $product;
    $page = 'user';
    if ($_SESSION['user']['role'] == 'admin'){
        $page = 'admin';
    }
    header("Location: ../?page=".$page);
    exit();
}

?>