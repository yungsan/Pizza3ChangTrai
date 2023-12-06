<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "pizza3changtrai";

$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

?>
// $host = "localhost";
// $dbname = "pizza3changtrai";
// $username = "root";
// $password = "";

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
//     // Set the PDO error mode to exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     die();
// }

?>

