<?php 
require_once('../../../../config/database.php');
$category_name = $_POST['category_name'];
$id = $_POST['id'];

$my_path = NULL;

if (isset($_FILES['thumbnail'])){
    $tmp = $_FILES['thumbnail']['tmp_name'];
    $my_path = './thumbnails/'.time().$_FILES['thumbnail']['name'];
    move_uploaded_file($tmp, $my_path);
}

$sql = "UPDATE categories SET category_name = '$category_name'";

if ($my_path){
    $sql .= ", thumbnail = '$my_path'";
}


$sql .= "  WHERE id = $id";

if ($connect->query($sql)){
    echo "Update chuyên mục thành công";
}
else {
    echo "Update chuyên mục thất bại!";
}

?>