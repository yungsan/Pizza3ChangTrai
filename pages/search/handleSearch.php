<?php
// require_once('../../config/database.php');
$keyword = $_GET['keyword'];
// $sql = "SELECT * FROM products WHERE product_name LIKE '%$keyword%' ORDER BY id DESC";
// $products = $connect->query($sql);
// if(!$products) {
//     echo "Error";
//     die();
// }

header('Location: ../../?page=search&keyword='.$keyword);
exit();

?>
