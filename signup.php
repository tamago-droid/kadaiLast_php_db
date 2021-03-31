<?php
// 1.POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// 2.DBに接続
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost'; #データソースネーム
try {
    $pdo = new PDO($dsn, 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

// 4.SQL作成
    $stmt = $pdo->prepare("INSERT INTO user_table(id, name, email, password, indate )
    VALUES(NULL, :name, :email, :password, sysdate())");
    
    // バインド変数に変数を入れる（「:変数名」=bind変数）、次に文字列or数値か。
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);  
    $stmt->bindValue(':password', $pass, PDO::PARAM_STR);  
    // 実行
    $status = $stmt->execute();

    if ($status==false) {
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    } else {
        // insert成功したら、ログイン画面のリンク表示
        $msg = '<h1>Welcome to HOUSEHOLD ACCOUNT !</h1>';
        $link = '<a href="login_form.php">ログインページへ</a>';
    }
?>

<!-- ここからブラウザ画面 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録結果</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>
<body>

<div class="cmt"><?= $msg?></div>
<div class="theme2"><?= $link ?></div>

</body>
</html>