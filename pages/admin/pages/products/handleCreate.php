<?php 
require_once('../../../../config/database.php');

$user_id = $_POST["user_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["price"];
$product_category = $_POST["category_id"];
$product_description = $_POST["description"];
// thumbnail
$temp_thumbnail = $_FILES['thumbnail']['tmp_name'];
$new_path = './upload/'.time().'_'.$_FILES['thumbnail']['name'];
move_uploaded_file($temp_thumbnail, $new_path);
// images


?>