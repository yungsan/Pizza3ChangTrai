<?php 
require_once('../../../../config/database.php');

$user_id = $_POST["user_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["price"];
$product_category = $_POST["category_id"];
$product_description = $_POST["description"];
// thumbnail
$temp_path_thumbnail = $_FILES['thumbnail']['tmp_name'];
$new_path_thumbnail = './upload/thumbnails/'.time().'_'.$_FILES['thumbnail']['name'];
move_uploaded_file($temp_path_thumbnail, $new_path_thumbnail);
// images
$length = count($_FILES['images']['name']);
$images_path = [];

for ($i = 0; $i < $length; $i++){
    $temp_path_image = $_FILES['images']['tmp_name'][$i];
    $new_path_image = './upload/images/'.time().'_'.$_FILES['images']['name'][$i];
    move_uploaded_file($temp_path_image, $new_path_image);
    array_push($images_path, $new_path_image);
}

$images_path = json_encode($images_path);

$sql = "INSERT INTO products (user_id, product_name, price, category_id, description, thumbnail, images) VALUES ($user_id, '$product_name', $product_price, $product_category, '$product_description', '$new_path_thumbnail', '$images_path')";
if ($connect->query($sql)){
    echo "Thêm sản phẩm thành công!";
}
else {
    echo "Thêm sản phẩm thất bại!";
}

?>

