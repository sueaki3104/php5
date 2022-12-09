<?php
// POSTデータ確認
// var_dump($_POST);
// exit();
session_start();
include('functions.php');
check_session_id();

// 入力チェック DBにデータを格納するときにはデータの欠損は許されない
// そのため，ß以下の条件に合致する場合は以降の処理を中止してエラー画面を表示する．
// 必須項目（todo と deadline）のデータが送信されていない．
// 必須項目（todo と deadline）が空で送信されている はエラー
if (
  !isset($_POST['date_of_purchase']) || $_POST["date_of_purchase"]=='' ||
  !isset($_POST['distillery_name']) || $_POST["distillery_name"]=='' ||
  !isset($_POST['whisky_name']) || $_POST["whisky_name"]=='' ||
  !isset($_POST['whisky_age']) || $_POST["whisky_age"]=='' ||
  !isset($_POST['place']) || $_POST["place"]=='' ||
  !isset($_POST['how_many']) || $_POST["how_many"]=='' ||
  !isset($_POST['price']) || $_POST["price"]=='' ||
  !isset($_POST['memory']) || $_POST["memory"]==''
) {
  exit('必要事項の入力がされていません');
}

// データの受け取り
// todo_input.phpからPOSTで送られているのでPOSTで受け取る
$date_of_purchase = $_POST["date_of_purchase"];
$distillery_name = $_POST["distillery_name"];
$whisky_name =  $_POST["whisky_name"];
$whisky_age =  $_POST["whisky_age"];
$place =  $_POST["place"];
$how_many =  $_POST["how_many"];
$price =  $_POST["price"];
$memory =  $_POST["memory"];

// DB接続 MySQLからデータを引っ張ってくる関数をincludeする（本来ここに関数書くけど他にも同じもの書くから
// functions.phpにまとめて置いてそこから引っ張ってくるようにした）
include('functions.php');
// DBに接続するコードは決まっている（pdo）
$pdo = connect_to_db();


// SQL作成実行
$sql = 'INSERT INTO whisky_table (id, date_of_purchase, distillery_name, whisky_name, whisky_age, place, how_many, price, memory, created_at, updated_at) 
VALUES (NULL, :date_of_purchase, :distillery_name, :whisky_name, :whisky_age, :place, :how_many, :price, :memory, now(), now())';

$stmt = $pdo->prepare($sql);
// バインド変数を設定 PDO::PARAM_STR は「文字列だよ」って事。PDO::PARAM_INTは「数値だぜ」っていう意味。
$stmt->bindValue(':date_of_purchase', $date_of_purchase, PDO::PARAM_STR);
$stmt->bindValue(':distillery_name', $distillery_name, PDO::PARAM_STR);
$stmt->bindValue(':whisky_name', $whisky_name, PDO::PARAM_STR);
$stmt->bindValue(':whisky_age', $whisky_age, PDO::PARAM_INT);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':how_many', $how_many, PDO::PARAM_INT);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':memory', $memory, PDO::PARAM_STR);
// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// データをcreateで保存したら、画面をinputに戻す
header("Location:whisky_1_input.php");
exit();
