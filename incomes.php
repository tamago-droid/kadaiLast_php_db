<?php
// セッション開始宣言
session_start();
$name = $_SESSION["name"];

// DB接続
try {
    $pdo = new PDO('mysql:dbname=hha_db;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }

// 2.SQL作成
// select文
$stmt = $pdo->prepare("SELECT * FROM money_table WHERE balance = '収入'");
$status = $stmt->execute();

// 3.selectしたデータ表示
$view="";
if($status == false) {
    // SQL実行時にエラーがある場合の処理
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // 削除ボタン→それぞれのレコードのidの値をリンク先に送信する。
        $view .= "<tr>".
        "<td>".$result['indate']."</td>".
        "<td>".$result['name']."</td>".
        "<td>".$result['item']."</td>".
        "<td>".$result['howmuch']."</td>".
        "<td>"."<a class='btn_dlt' href=in_delete.php?id=" . $result['id'] . ">削除</a>"."</td>".
        "<td>"."<a href=update_form.php?id=" . $result['id'] . ">編集</a>"."</td>".
        "</tr>";
    
    }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>収入履歴</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>
<body>
 <!-- ここからheader -->
<header>
    <p><?= $name ?>さん、おつかれさま ;)</p>
    <nav>
        <a href="index.php">新規入力</a>
        <a href="expenses.php">すべての支出</a>
        <a href="logout.php">ログアウト</a>
    </nav>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
<div class="theme">
    <h1>HOUSEHOLD ACCOUNT</h1>
</div>
<div class="theme2">
    <h2>すべての収入</h2>
</div>

<div clas="table in">
    <table border="1">
        <thead>
            <tr>
                <th>日付</th>
                <th>名前</th>
                <th>項目</th>
                <th>金額</th>
            </tr>
        </thead>
        <tbody>
            <?= $view ?>
        </tbody>
        
    </table>
</div>

<!-- mainここまで -->

</body>
</html>