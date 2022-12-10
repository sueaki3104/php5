<?php
// My SQL に接続するコード
function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_l08_06;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';


    // returnを使う
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
    }
}

//ログインの有無を判断する関数を作成する．
//関数の役割は
//ログインしていない場合はログインページへ強制送還．
//ログインしている場合は session_id を更新してセッション変数に保存する．
//セッション変数には常に最新の session_id が入っている状態にする

function check_session_id()
{
  if (
    !isset($_SESSION["session_id"]) ||
    $_SESSION["session_id"] != session_id()
  ) {
    header("Location:whisky_7_login.php");
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}