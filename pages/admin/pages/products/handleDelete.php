<?php 
require_once('../../../../config/database.php');

$id = $_POST['product_id'];
$sql = "DELETE FROM products WHERE id = $id";
if ($connect->query($sql)){
    echo "Xoá thành công!";
}
else {
    echo "Xoá sản phẩm thất bại!";
}
?>