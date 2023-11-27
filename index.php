<?php
ob_start();
session_start();



include("includes/header.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    include 'pages/home.php';
} 
else if ($page === 'products') {
    include 'pages/products/index.php';
} 
else if ($page === 'login') {
    include 'pages/login.php';
} 
else if ($page === 'logout') {
    unset($_SESSION["user_id"]);
    header("Location: ?page=login");
    exit();
} 
else if ($page === 'register') {
    include 'pages/register.php';
}
else if ($page === 'user') {
    include 'pages/profile/index.php';
} 

else {
    include 'pages/home.php';
}

include("includes/footer.php");
ob_end_flush();
?>