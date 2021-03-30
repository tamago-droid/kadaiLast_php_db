<?php

// 1.入力チェック(受信確認処理)
if(
    #変数に値がない or　空の値がセットされているとき
    !isset($_POST["balance"]) || $_POST["balance"] =="" ||
    !isset($_POST["item"]) || $_POST["item"] ==""||
    !isset($_POST["howmuch"]) || $_POST["howmuch"] ==""    
) {
    // 上の条件に当てはまると'ParamError'とエラー表示が出る。
    exit('ParamError');
}

// 2.POSTの値取得　※nameはセッションから読み込む
$id = $_POST["id"];
$balance = $_POST["balance"];
$item = $_POST["item"];
$howmuch = $_POST["howmuch"];

//3.DB接続
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost'; #データソースネーム
try {
    $pdo = new PDO($dsn, 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

// 4.SQL作成
// update文
$stmt = $pdo->prepare("UPDATE money_table SET balance=:balance, item =:item,
howmuch=:howmuch WHERE id=:id");

// $stmt = $pdo->prepare("INSERT INTO money_table(id, name, balance, item, howmuch,
// indate )VALUES(NULL, :name, :balance, :item, :howmuch, sysdate())");

// バインド変数に変数を入れる（「:変数名」=bind変数）、次に文字列or数値か。
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':balance', $balance, PDO::PARAM_STR);  
$stmt->bindValue(':item', $item, PDO::PARAM_STR);  
$stmt->bindValue(':howmuch', $howmuch, PDO::PARAM_STR);  

// dbに入れる。（実行= execute）
$status = $stmt->execute();

// 5.update後処理
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //入力内容に問題なければ、入力データがdbに送られる
    // 入力したbalanceの値により、収入か支出の一覧にリダイレクト
    // ※書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    if($balance == "支出") {
        header("Location: expenses.php");
        exit;
    }else {
        header("Location: incomes.php");
        exit;
    }
    
}

?>
