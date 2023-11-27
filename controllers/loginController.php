<?php
require_once("../config/database.php");
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT id
        FROM users 
        WHERE 
            username = '$username' AND 
            password = '$password'";

$result = $connect->query($sql);

if ($result->num_rows == 0) {
    echo "dang nhap that bai";
} else {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["user_id"] = $row['id'];
    header("Location: ../?page=user");
    exit();
}

?>