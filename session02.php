<?php
session_start();

// `$_SESSION['keyword']`はセッション変数なので定義していなくても呼び出せる
$string = $_SESSION['keyword'] . '&MySQL';
$string = $_SESSION['number'] . '&MySQL';

echo $_SESSION['keyword'];
echo $_SESSION['number'];

exit();

?>

