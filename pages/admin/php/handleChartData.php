<?php
require '../../../config/database.php'; 
$sql = "SELECT category_name, COUNT(*) as amount
        FROM products p JOIN categories c ON c.id = p.category_id  
        GROUP BY category_id";
$result = $connect->query($sql);
$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $item = [$row['category_name'], $row['amount']];
        array_push($data, $item);
    }
}
// var_dump($data);
echo json_encode($data);
?>