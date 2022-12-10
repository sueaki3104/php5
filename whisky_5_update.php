<?php
// 入力項目のチェック
// var_dump($_POST);
// exit();

session_start();
include('functions2.php');
check_session_id();

if (
  !isset($_POST['date_of_purchase']) || $_POST['date_of_purchase'] == '' ||
  !isset($_POST['distillery_name']) || $_POST['distillery_name'] == '' ||
  !isset($_POST['whisky_name']) || $_POST['whisky_name'] == '' ||
  !isset($_POST['whisky_age']) || $_POST['whisky_age'] == '' ||
  !isset($_POST['place']) || $_POST['place'] == '' ||
  !isset($_POST['how_many']) || $_POST['how_many'] == '' ||
  !isset($_POST['price']) || $_POST['price'] == '' ||
  !isset($_POST['memory']) || $_POST['memory'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  exit('編集upデータ入力ミス');
}

$date_of_purchase = $_POST["date_of_purchase"];
$distillery_name = $_POST["distillery_name"];
$whisky_name =  $_POST["whisky_name"];
$whisky_age =  $_POST["whisky_age"];
$place =  $_POST["place"];
$how_many =  $_POST["how_many"];
$price =  $_POST["price"];
$memory =  $_POST["memory"];
$id =  $_POST["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE whisky_table SET 
date_of_purchase=:date_of_purchase,
distillery_name=:distillery_name, 
whisky_name=:whisky_name, 
whisky_age=:whisky_age, 
place=:place, 
how_many=:how_many, 
price=:price, 
memory=:memory, 
updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':date_of_purchase', $date_of_purchase, PDO::PARAM_STR);
$stmt->bindValue(':distillery_name', $distillery_name, PDO::PARAM_STR);
$stmt->bindValue(':whisky_name', $whisky_name, PDO::PARAM_STR);
$stmt->bindValue(':whisky_age', $whisky_age, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':how_many', $how_many, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':memory', $memory, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:whisky_3_read.php');
exit();









// $sql = 'UPDATE * FROM whisky_table';
// $stmt = $pdo->prepare($sql);

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

