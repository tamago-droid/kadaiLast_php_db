<?php
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
        $view .= "<div>".$result['indate']." ".$result['name']." ".$result['item']." ".$result['howmuch']."</div>";
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
</head>
<body>
 <!-- ここからheader -->
<header>
    <nav>
        <a href="index.php">新規入力</a>
        <a href="expenses.php">すべての支出</a>
    </nav>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
<h2>すべての収入</h2>
<div id="list"><?= $view ?></div>
<!-- mainここまで -->

</body>
</html>