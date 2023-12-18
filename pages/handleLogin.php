<?php
require_once("../config/database.php");
$username = trim($_POST["username"]);
$password = md5($_POST["password"]);

$sql = "SELECT * FROM users 
        WHERE 
            username = '$username' AND 
            password = '$password'";

$user = $connect->query($sql);
$page = 'user';

if ($user->num_rows == 0) {
    echo "Tài khoản không tồn tại!";
} else {
    $row = $user->fetch_assoc();
    session_start();
    $_SESSION["user"] = $row;
    if ($_SESSION['user']['role'] == 'admin'){
        $page = 'admin';
    }
    echo $page;
}


?>