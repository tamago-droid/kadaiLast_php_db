<?php
// セッション開始宣言
session_start();
// 入力した値を受け取る
$name = $_POST['name'];
$pass = $_POST['pass'];
// 中身確認
// var_dump($pass);

// データソースネーム
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost';

try {
    $pdo = new PDO($dsn, "root", "root");
} catch (PDOException $e) {
        $msg = $e->getMessage();
}

// 入力したnameのデータを呼び出してる
$stmt = $pdo->prepare('SELECT * FROM user_table WHERE name = :name');
$stmt->bindValue(':name', $name);
$stmt->execute();
$row = $stmt->fetch(); #入力したnameのrowを取り出す

//中身確認 
// var_dump($_SESSION['name']);

// tableのパスワードとマッチしているか
if($pass == $row['password']) {
    // セッションにnameを保存
    $_SESSION['name'] = $row['name'];
    
    $msg = "ログインしました";
    $link = "<a href=index.php>家計簿画面へ</a>"; 
} else {
    $msg = "name.かpass.が間違っています";
    $link = "<a href=login_form.php>戻る</a>";
}
?>

<!-- ここからブラウザ画面 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2><?= $msg?></h2>
<div><?= $link?></div>

</body>
</html>