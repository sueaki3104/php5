<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style_7_login.css">
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
        パスワード: <input type="password" id="input_pass" value="" name = "password">
                  <button id="btn_passview">表示</button>
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="whisky_10_register.php">新規登録はこちらから</a>
    </fieldset>
  </form>

<script>
  window.addEventListener('DOMContentLoaded', function(){

	// (1)パスワード入力欄とボタンのHTMLを取得
	let btn_passview = document.getElementById("btn_passview");
	let input_pass = document.getElementById("input_pass");

	// (2)ボタンのイベントリスナーを設定
	btn_passview.addEventListener("click", (e)=>{

		// (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
		e.preventDefault();

		// (4)パスワード入力欄のtype属性を確認
		if( input_pass.type === 'password' ) {

			// (5)パスワードを表示する
			input_pass.type = 'text';
			btn_passview.textContent = '非表示';

		} else {

			// (6)パスワードを非表示にする
			input_pass.type = 'password';
			btn_passview.textContent = '表示';
		}
	});

});

</script>

</body>

</html>