<?php
ob_start();
session_start();

include("includes/header.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    include 'pages/home.php';
} 
// products
else if ($page === 'products') {
    include 'pages/products/index.php';
} 
else if ($page === 'create') {
    include 'pages/products/create.php';
}
else if ($page === 'detail') {
    include 'pages/products/detail.php';
}  
// auth
else if ($page === 'login') {
    include 'pages/login.php';
} 
else if ($page === 'logout') {
    unset($_SESSION["user"]);
    header("Location: ?page=login");
    exit();
} 
else if ($page === 'register') {
    include 'pages/register.php';
}
// user
else if ($page === 'user') {
    include 'pages/profile/index.php';
} 
// admin
else if ($page === 'admin') {
    header("Location: ./pages/admin/");
} 
else {
    include 'pages/404.html';
}

include("includes/footer.php");
ob_end_flush();
?>