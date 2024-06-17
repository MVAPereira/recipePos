<?php 

include 'connect.php';

$foodName =  $_POST['foodName'];

$sql = "SELECT * FROM foodtable WHERE foodName like '$foodName%'";
$query = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($query)){
    
    $results[] = array(
        'quantity' => $row['quantity'],
        'foodName' => $row['foodName'],
        'carb' => $row['carb'],
        'protein' => $row['protein'],
        'fat' => $row['fat']
    );
}

echo json_encode($results);

?>