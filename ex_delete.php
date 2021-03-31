<?php
//1.DB接続して、SQL送信
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost'; #データソースネーム
try{
    $pdo = new PDO($dsn, 'root', 'root');
    $stmt = $pdo->prepare("DELETE FROM money_table WHERE id = :id"); #SQL作成
    $stmt->execute(array(':id' => $_GET["id"])); #idの値を受け取り、該当するレコードだけ削除される。
    
    //2.支出一覧（expenses.php）にリダイレクト
    header("Location: expenses.php");
    exit;
    
}catch(Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}

?>