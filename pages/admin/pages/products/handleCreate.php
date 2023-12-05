<?php
$host = "localhost";
$dbname = "pizza3changtrai";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    // Validate and sanitize inputs as needed

    // Handle file upload (thumbnail)
    $thumbnail_path = 'uploads/img/'. $_FILES['thumbnail']['name'];
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail_path);

    // Handle multiple file uploads (images)
    
    $image_paths = [];
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $image_path = 'uploads/thumbnail/' . time() . '_' . $_FILES['images']['name'][$key];
        move_uploaded_file($tmp_name, $image_path);
        $image_paths[] = $image_path;
    }


    //Convert image paths to a JSON string or store in a way that suits your database schema
    $images_json = json_encode($image_paths);

    // Insert data into the database
    $query = "INSERT INTO products (user_id, product_name, price, category_id, description, thumbnail, images) 
              VALUES (:user_id, :product_name, :price, :category_id, :description, :thumbnail, :images)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':thumbnail', $thumbnail_path);
    $stmt->bindParam(':images', $images_json);

    if ($stmt->execute()) {
        echo "Cập nhật sản phẩm thành công.";
    } else {
        echo "Cập nhật sản phẩm thất bại";
    }
}
?>

