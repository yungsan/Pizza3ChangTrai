<?php
require_once('../../config/database.php');
session_start();

$new_path = null;

if ($_FILES['avatar']['error'] > 0) {
    echo 'Hình ảnh bị lỗi. Hãy thử lại!';
    exit();
} else {
    $tmp_path = $_FILES['avatar']['tmp_name'];
    $new_path = 'avatar/' . time() . '_' . $_FILES['avatar']['name'];
    move_uploaded_file($tmp_path, $new_path);
}

$id = $_SESSION['user']['id'];
$sql = "UPDATE users SET avatar = '$new_path' WHERE id=$id";
if ($connect->query($sql)) {
    $_SESSION['user']['avatar'] = "$new_path";
    echo "Cập nhật Avatar thành công";
} else {
    echo "Error updating record: " . $connect->error;
}
?>