<?php
require_once('../../config/database.php');
session_start();

$path = null;

if ($_FILES['avatar']['error'] > 0) {
    echo 'Hình ảnh bị lỗi. Hãy thử lại!';
    exit();
} else {
    $tmp_path = $_FILES['avatar']['tmp_name'];
    $new_path = '../../assets/images/upload/' . time() . '_' . $_FILES['avatar']['name'];
    move_uploaded_file($tmp_path, $new_path);
    $path = 'assets/images/upload/' . time() . '_' . $_FILES['avatar']['name'];
}

$id = $_SESSION['user']['id'];
$sql = "UPDATE users SET avatar = '$path' WHERE id=$id";
if ($connect->query($sql)) {
    $_SESSION['user']['avatar'] = $path;
    echo "Cập nhật Avatar thành công";
} else {
    echo "Error updating record: " . $connect->error;
}
?>