<?php
// DB接続
$dsn = 'mysql:dbname=hha_db;charset=utf8;host=localhost'; #データソースネーム
try{
    $pdo = new PDO($dsn, 'root', 'root');
    $stmt = $pdo->prepare("DELETE FROM money_table WHERE id = :id"); #SQL作成
    echo "<script>alert('削除しました');</script>";
    $stmt->execute(array(':id' => $_GET["id"])); #idの値を受け取り、該当するレコードだけ削除される。
    // $alert = "<script type='text/javascript'>"alert('削除しました');"</script>";
    
    // 収入一覧（incomes.php）にリダイレクト
    header("Location: incomes.php");
    exit;

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
    <title>削除</title>
</head>
<body>

 <!-- <a href="incomes.php">収入一覧にもどる</a> -->
 <!-- jsよみこみ -->
 <script>
 </script>
</body>
</html>