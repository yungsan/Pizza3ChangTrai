<?php
require_once("../config/database.php");
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT *
        FROM users 
        WHERE 
            username = '$username' AND 
            password = '$password'";

$users = $connect->query($sql);

if ($users->num_rows == 0) {
    echo "dang nhap that bai";
} else {
    $user = $users->fetch_assoc();
    session_start();
    $_SESSION["user"] = $user;
    $page = 'user';
    if ($_SESSION['user']['role'] == 'admin'){
        $page = 'admin';
    }
    header("Location: ../?page=".$page);
    exit();
}

?>