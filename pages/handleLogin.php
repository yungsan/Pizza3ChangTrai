<?php
require_once("../config/database.php");
$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "SELECT *
        FROM users 
        WHERE 
            username = '$username' AND 
            password = '$password'";

$products = $connect->query($sql);

if ($products->num_rows == 0) {
    echo "dang nhap that bai";
} else {
    $row = $products->fetch_assoc();
    session_start();
    $_SESSION["user"] = $row;
    $page = 'user';
    if ($_SESSION['user']['role'] == 'admin'){
        $page = 'admin';
    }
    header("Location: ../?page=".$page);
    exit();
}

?>