<?php
// セッション開始宣言
session_start();

$name = $_SESSION["name"];

// 1.DB接続
try {
    $pdo = new PDO('mysql:dbname=hha_db;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }

// 2.SQL作成
// select文
$stmt = $pdo->prepare("SELECT * FROM money_table WHERE balance = '支出'");
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
        "<td>"."<a href=delete_ex.php?id=" . $result['id'] . ">削除</a>"."</td>".
        "<td>"."<a href=update_form.php?id=" . $result['id'] . ">編集</a>"."</td>".
        "</tr>";
    
    }
}
?>

<?php
// DB接続
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost'; #データソースネーム
try{
    $pdo = new PDO($dsn, 'root', 'root');
    $stmt = $pdo->prepare("DELETE FROM money_table WHERE id = :id"); #SQL作成
    $stmt->execute(array(':id' => $_GET["id"])); #idの値を受け取り、該当するレコードだけ削除される。
    $msg = "削除しました";

}catch(Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>支出履歴</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <!-- ここからheader -->
<header>
    <nav>
        <a href="index.php">新規入力</a>
        <a href="incomes.php">すべての収入</a>
        <a href="logout.php">ログアウト</a>
    </nav>
    <p><?= $name ?>さん、おつかれさまです ;)</p>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
<h1>家計簿</h1>
<h2>すべての支出</h2>

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

</body>
</html>