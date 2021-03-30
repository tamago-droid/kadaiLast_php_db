<?php
// セッション開始宣言
session_start();

$name = $_SESSION["name"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿</title>
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
        <a href="expenses.php">すべての支出</a>
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
    <h2>入力する</h2>
</div>
<form action="insert.php" method="post" class="frm">
    <fieldset>
    <label>収支：
        <select name="balance">
            <option value="支出">支出</option>
            <option value="収入">収入</option>
        </select>
    </label>
    
    <label>項目：
        <select name="item">
            <option value="食費">食費</option>
            <option value="水道光熱費">水道光熱費</option>
            <option value="住居費">住居費</option>
            <option value="日用雑費">日用雑費</option>
            <option value="給与">給与</option>
            <option value="ボーナス">ボーナス</option>
            <option value="その他">その他</option>
        </select>
    </label>
    
    <label>金額：<input type="number" name="howmuch" required></label>
    
    <div>
        <input type="submit" value="送信する">
        <input type="reset" value="入力をリセットする">
    </div>
    </fieldset>
</form> 
<!-- mainここまで -->
</body>
</html>