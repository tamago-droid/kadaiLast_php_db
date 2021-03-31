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
        "<td>"."<a class='btn_dlt' href=ex_delete.php?id=" . $result['id'] . ">削除</a>"."</td>".
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
</head>
<body>
 <!-- ここからheader -->
<header>
    <p><?= $name ?>さん、おつかれさま ;)</p>
    <nav>
        <a href="index.php">新規入力</a>
        <a href="incomes.php">すべての収入</a>
        <a href="logout.php">ログアウト</a>
    </nav>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
<div class="theme">
    <h1>HOUSEHOLD ACCOUNT</h1>
</div>
<div class="theme2">
    <h2><i class="fa fa-th-list "></i> すべての支出</h2>
</div>

<!-- 支出一覧 -->
<div class="table ex">
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

<!-- トップに戻るボタン -->
<a href="#" class="top_btn"><i class="fa fa-angle-double-up fa-4x"></i> </a>  

<!-- mainここまで -->

<!-- jquery読み込み-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- js読み込み-->
<script type="text/javascript" src="top_btn.js"></script>

</body>
</html>