<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/input.css">
  <title>ウィスキーリストログイン画面</title>
</head>

<body>
  <form action = "./whisky_8_login_act.php" method = "POST">
    <fieldset>
      <legend>ウィスキーリストログイン画面</legend>
      <div>
        ユーザー名: <input type="text" name = "username">
      </div>
      <div>
        パスワード: <input type="text" name = "password">
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="whisky_10_register.php">or 新規登録</a>
    </fieldset>
  </form>

</body>

</html>