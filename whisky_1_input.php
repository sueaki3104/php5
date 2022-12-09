<?php
session_start();
include('functions.php');
check_session_id();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/input.css">
  <title>ウィスキー購入に関するデータ登録（入力画面）</title>
</head>

<body>
  <header class="header">
            <h1>自分だけのウィスキーデータベースを作ろう！</h1>
    </header>

<!-- ウキスキーの登録を押すと 各種データを whisky_2_create.php に POST（POSTメソッドは渡す値を人に見えない状態でくっつけます） で送ります -->
  <form class="form" action="./whisky_2_create.php" method="POST">
    <fieldset class="fieldset">
          <a href="./whisky_3_read.php">ウィスキー購入一覧画面へ移動</a>
      <legend>ウィスキー購入に関するデータ登録（入力画面）</legend>
        <div class="input">
          購入日 :<br> <input type="date" name="date_of_purchase" style="width:200px;"> 
        </div>
        <div class="input">
          蒸留所名（ブランド）: <br>  <input type="text" name="distillery_name" placeholder="例：サントリー" style="width:200px;">
        </div>
        <div class="input">
          ウィスキー名: <br>  <input type="text" name="whisky_name" placeholder="例：山崎" style="width:200px;">
        </div>
        <div class="input">
          熟成年数:  <br> <input type="text" name="whisky_age"  placeholder="例：18  半角数字　NAは0で入力" style="width:200px;">
        </div>
        <div class="input">
          購入店名:  <br> <input type="text" name="place" placeholder="例：やまや　古賀店" style="width:200px;">
        </div>
        <div class="input">
          購入本数:  <br> <input type="number" name="how_many" placeholder="例：2 半角数字のみ" style="width:200px;">
        </div>
        <div class="input">
          値段（税込）:  <br> <input type="number" name="price" placeholder="例：10000 半角数字のみ" style="width:200px;">
        </div>
        <div class="input">
          想い出:  <br> <textarea name="memory" placeholder="購入の思い出を書いてください" style="width:200px;" style="height:400px;"></textarea>
        </div>
        <div>
          <button>ウィスキーの登録</button>
        </div>    
      </fieldset>
  </form>

</body>

</html>