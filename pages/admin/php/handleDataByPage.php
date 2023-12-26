<?php
require '../../../config/database.php';
$start = $_POST['start']; 
$max = $_POST['max']; 
$table = strtolower($_POST['table']); 

if ($start == 2){
    $start = $max;
}
else if ($start > 2) {
    $start = $start * $max;
}

$sql = "SELECT * FROM $table LIMIT $start, $max";

$result = $connect->query($sql);
$data = [];

if ($result){
    while($row = $result->fetch_assoc()){
        array_push($data, $row);
    }
}
// echo $sql;

echo json_encode($data);



?>