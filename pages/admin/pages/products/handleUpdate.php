<?php 
require_once('../../../../config/database.php');

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_category = $_POST["product_category"];
$product_description = $_POST["product_description"];
$product_images_array = json_decode($_POST["product_images_array"]);

// var_dump($product_images_array);
// exit();

// thumbnail 
$new_path_thumbnail = NULL;
if (isset($_FILES['thumbnail'])) {
    $temp_path_thumbnail = $_FILES['thumbnail']['tmp_name'];
    $new_path_thumbnail = 'upload/thumbnails/'.time().'_'.$_FILES['thumbnail']['name'];
    move_uploaded_file($temp_path_thumbnail, $new_path_thumbnail);
}

// images
if (isset($_FILES['images'])){
    $length = count($_FILES['images']['name']);
    for ($i = 0; $i < $length; $i++){
        $temp_path_image = $_FILES['images']['tmp_name'][$i];
        $new_path_image = './upload/images/'.time().'_'.$_FILES['images']['name'][$i];
        move_uploaded_file($temp_path_image, $new_path_image);
        array_push($product_images_array, $new_path_image);
    }
}
$product_images_array = json_encode($product_images_array);



$sql = "UPDATE products 
        SET product_name = '$product_name', 
            price = $product_price, 
            category_id = $product_category, 
            description = '$product_description'";

if ($new_path_thumbnail){
    $sql .= ", thumbnail = '$new_path_thumbnail'";
}

$sql .= ", images = '$product_images_array'" ;
$sql .= "  WHERE id = $product_id";
        
if ($connect->query($sql)){
    echo "Cập nhật sản phẩm thành công!";
}
else {
    echo "Cập nhật sản phẩm thất bại!";
}

?>

