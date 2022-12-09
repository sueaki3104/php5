<?php
// 関数指定
session_start();
include('functions.php');
check_session_id();

// id受け取り 編集だからGETを使う
$id = $_GET['id'];


// phpからDB接続をするにはpdoを使います
$pdo = connect_to_db();


// SQL実行
// データを取得するにはSELECTを使う　 
$sql = 'SELECT * FROM whisky_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>購入したウィスキーの編集画面</title>
</head>

<body>
  <!-- submitを押すと todo と deadline と id のデータを todo_update.php に POST で送ります -->
  <form action="./whisky_5_update.php" method="POST">
    <fieldset>
      <legend>購入したウィスキーの編集画面</legend>
      <a href="./whisky_3_read.php">一覧画面</a>
      <div class="input">
          購入日 :<br> <input type="date" name="date_of_purchase" style="width:200px;" value="<?= $record['date_of_purchase'] ?>"> 
        </div>
        <div class="input">
          蒸留所名（ブランド）: <br>  <input type="text" name="distillery_name" style="width:200px;" value="<?= $record['distillery_name'] ?>">
        </div>
        <div class="input">
          ウィスキー名: <br>  <input type="text" name="whisky_name" style="width:200px;" value="<?= $record['whisky_name'] ?>">
        </div>
        <div class="input">
          熟成年数:  <br> <input type="text" name="whisky_age" style="width:200px;" value="<?= $record['whisky_age'] ?>">
        </div>
        <div class="input">
          購入店名:  <br> <input type="text" name="place" style="width:200px;" value="<?= $record['place'] ?>">
        </div>
        <div class="input">
          購入本数:  <br> <input type="number" name="how_many" style="width:200px;" value="<?= $record['how_many'] ?>">
        </div>
        <div class="input">
          値段（税込）:  <br> <input type="number" name="price" style="width:200px;" value="<?= $record['price'] ?>">
        </div>
        <div class="input">
          想い出:  <br> <textarea name="memory" style="width:200px;" style="height:400px;"><?php echo $record['memory']; ?></textarea>
        </div>

      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>編集登録</button>
      </div>
    </fieldset>
  </form>

</body>

</html>