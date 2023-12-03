<?php 
require_once('../../../../config/database.php');
$category_name = $_POST['category_name'];

$tmp = $_FILES['thumbnail']['tmp_name'];
$my_path = './thumbnails/'.time().$_FILES['thumbnail']['name'];

move_uploaded_file($tmp, $my_path);

$sql = "INSERT INTO categories (category_name, thumbnail) VALUES ('$category_name', '$my_path')";

if ($connect->query($sql)){
    echo "Thêm chuyên mục thành công";
}
else {
    echo "Thêm chuyên mục thất bại!";
}

?>