<?php 
require_once("../config/database.php");

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = md5($_POST["password"]);

// check exist username
$sql = "SELECT * FROM users WHERE username = '$username'";
if($connect->query($sql)->num_rows >= 1) {
    echo "Tên đăng nhập đã tồn tại. Hãy sử dụng tên khác!";
    exit();
}
// check exist email
$sql = "SELECT * FROM users WHERE email = '$email'";
if($connect->query($sql)->num_rows >= 1) {
    echo "Email này đã được đăng ký. Hãy sử dụng email khác!";
    exit();
}

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if (!($connect->query($sql))){
    echo "Error: " . $sql . "<br>" . $connect->error;
    die();
}

echo "Đăng ký thành công!";

?>