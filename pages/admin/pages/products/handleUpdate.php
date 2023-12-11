<?php 
require_once('../../../../config/database.php');

$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_category = $_POST["product_category"];
$product_description = $_POST["product_description"];


$sql = "UPDATE products SET product_name = '$product_name', price = $product_price, category_id = $product_category, description = '$product_description'";
if ($connect->query($sql)){
    echo "Cập nhật sản phẩm thành công!";
}
else {
    echo "Cập nhật sản phẩm thất bại!";
}

?>

