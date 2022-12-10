<?php
// 関数を持ってくるよ
include('functions2.php');
// $_GETから持ってきたいものを持ってきて変数に入れるよ
$user_id = $_GET['user_id'];
$todo_id = $_GET['todo_id'];
// DBに繋げるよ
$pdo = connect_to_db();
// SQLに繋げて実行するよ いいねがあるかどうかは数字として保存しているのでCOUNTする
$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id ';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// fetchColum 特定のカラムを抜き出すこと
$like_count = $stmt->fetchColumn();
// var_dump($like_count);
// exit();

if($like_count !=0){
// いいねを押している状態で like を押すといいねを押した状態をDELETE します　っていうコマンド COUNTすることで0以外がある　という状態
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id ';
// いいねが押されていなかったら、likeを押したらいいねになる（ログインしたuser_idとlikeしたtodo_idを保存）
}else{
    $sql = 'INSERT INTO like_table (id, user_id, todo_id, created_at) VALUES (NULL, :user_id, :todo_id, sysdate())';
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:todo_read.php");
exit();
