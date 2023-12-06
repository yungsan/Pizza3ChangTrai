<?php
require_once('../../config/database.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $productName = $_POST['name'];
    $price = $_POST['price'];
    $productID = $_POST['id'];
    $thumbnail = $_POST['thumbnail'];
    // $size = $_POST['size'];
    $size = $_POST['size'];

    $stmt = $connect->prepare("INSERT INTO carts (ID, product_name, price, thumbnail, size) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("isdss", $productID, $productName, $price, $thumbnail, $size);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$connect->close();
