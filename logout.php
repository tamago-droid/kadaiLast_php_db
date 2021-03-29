<?php
// セッション開始宣言
session_start();

$_SESSION = array(); #セッションの中身をすべて削除
session_destroy(); #セッションを破壊
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>ログアウトしました</h2>
<a href="login_form.php">ログインページへ</a>  
</body>
</html>