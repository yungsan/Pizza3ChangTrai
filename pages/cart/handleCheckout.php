<?php 
require_once('../../config/database.php');

$user_id = $_POST['user_id'];
$products = $_POST['products'];
$total = 0;
$bill_id = time();

foreach($products as $row){
    $total += ($row['amount'] * $row['product_price']);
}

$sql = "INSERT INTO bills (id, user_id, total) VALUES ('$bill_id', $user_id, $total)";
if (!$connect->query($sql)) {
    echo "Tạo hoá đơn thất bại!";
}

foreach($products as $row){
    $product_id = $row['product_id'];
    $size = $row['size'];
    $amount = $row['amount'];
    $price = $row['product_price'];
    $size = $row['size'];
    $total = $amount * $price;
    $sql = "INSERT INTO bills_detail (bill_id, user_id, product_id, price, size, amount, total) VALUES ('$bill_id', $user_id, $product_id, $price, '$size', $amount, $total)";
    if (!$connect->query($sql)){
        echo "Đặt hàng thất bại!";
    }
}

echo "Đặt hàng thành công!";

?>