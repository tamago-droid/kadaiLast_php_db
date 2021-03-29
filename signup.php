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

//3.既存のレコード照らし合わせる

//フォームに入力されたemailが既存のデータとかぶっていないかチェック
// $stmt = $dbh->prepare('SELECT * FROM users_table WHERE email = :email');
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->execute();
// $row = $stmt->fetch();

// if ($row['email'] === $email) {
//     $msg = '同じメールアドレスが存在します。';
//     $link = '<a href="signup_form.php">戻る</a>';

// } else {
    //4.登録されていなければinsert 
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
    //入力内容に問題なければ、index.phpへリダイレクト（入力データがdbに送られ、再度入力画面に）
    // ※書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    // header("Location: index.php");
    // exit;
    $msg = '会員登録が完了しました';
    $link = '<a href="login_form.php">ログインページへ</a>';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録結果</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $msg ?></h2>
<div><?= $link ?></div>

</body>
</html>