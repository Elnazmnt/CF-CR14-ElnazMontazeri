<?php require_once 'components/db_connect.php';
$sql = "SELECT * FROM offers";
$result = mysqli_query($connect, $sql);
$offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($offers);
echo json_encode($offers);