<?php 
require_once("../config/database.php");

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// $user_id = time();
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if (!($connect->query($sql))){
    echo "Error: " . $sql . "<br>" . $connect->error;
    die();
}

header("Location: ../?page=login");
exit();


?>