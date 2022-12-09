<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/input.css">
  <title>新規ユーザ登録画面</title>
</head>

<body>
  <form action="whisky_11_register_act.php" method="POST">
    <fieldset>
      <legend>新規ユーザー登録画面</legend>
      <div>
        ユーザー名: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>新規登録</button>
      </div>
      <a href="whisky_7_login.php">or ログイン</a>
    </fieldset>
  </form>

</body>

</html>