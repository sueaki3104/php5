<?php
session_start();
// session変数を定義して値を入れよう

$_SESSION['keyword'] = 'whiskyが好き';
$_SESSION['number'] = '12,500';

echo $_SESSION['keyword'];
echo $_SESSION['number'];

exit();

?>

