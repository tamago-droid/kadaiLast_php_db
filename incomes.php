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
        "<td>"."<a class='btn_dlt' href=delete_in.php?id=" . $result['id'] . ">削除</a>"."</td>".
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
</head>
<body>
 <!-- ここからheader -->
<header>
    <nav>
        <a href="index.php">新規入力</a>
        <a href="expenses.php">すべての支出</a>
        <a href="logout.php">ログアウト</a>
    </nav>
    <p><?= $name ?>さん、おつかれさまです ;)</p>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
<h2>すべての収入</h2>
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


<!-- mainここまで -->
<!-- <script>alert("test");</script> -->
</body>
</html>