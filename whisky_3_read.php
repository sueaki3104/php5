<!-- 一覧画面 -->
<?php
// MySQLへ接続しDBからデータを取得
session_start();
include('functions.php');
check_session_id();

$pdo = connect_to_db();
// 並び替え ASC（昇順１・２・３） DESC(降順３・２・１)
// SELECT(抽出)・INSERT(挿入)・UPDATE(更新)・DELETE(削除)
$sql = 'SELECT * FROM whisky_table ORDER BY price  DESC';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// fetchAll() 関数でデータ自体を取得する
// 繰り返し処理を用いて，取得したデータから HTML タグを生成する
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
// echo'<pre>';
// var_dump($result);
// echo'</pre>';
// exit();

// fetchAllで取得した$resultを＄record変数に入れ替えてHTMLに表示
foreach ($result as $record) {
  $output .= "
    <tr>
    <!--htmlの該当箇所にデータを送り込む-->
      <td>{$record["date_of_purchase"]}</td>
      <td>{$record["distillery_name"]}</td>
      <td>{$record["whisky_name"]}</td>
      <td>{$record["whisky_age"]}</td>
      <td>{$record["place"]}</td>
      <td>{$record["how_many"]}</td>
      <td>{$record["price"]}</td>
      <td>{$record["memory"]}</td>
      
      <!-- 編集ボタンを出現 -->
      <td>
        <a href='./whisky_4_edit.php?id={$record["id"]}'>編集ボタン</a>
      </td>

      <!-- 削除ボタンを出現 -->
      <td>
        <a href='./whisky_6_delete.php?id={$record["id"]}'>削除ボタン</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style_read.css">

  <title>購入したウィスキーの一覧</title>
</head>

<body>
  <header class="header">
      <h1>買ってきたウィスキーの自分だけのデータベース</h1>
  </header>

  <fieldset class="fieldset">
    <legend>購入したウィスキーの一覧（購入金額の高い順に並んでいます）</legend>
    <a href="./whisky_1_input.php">入力画面へ移動</a>
    <table>
      <thead>
        <tr>
          <th>購入日</th>
          <th>蒸留所名（ブランド）</th>
          <th>ウィスキー名</th>
          <th>熟成年数</th>
          <th>購入店名</th>
          <th>購入本数</th>
          <th>値段（税込）</th>
          <th>想い出</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>