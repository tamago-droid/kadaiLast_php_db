<?php
// セッション開始宣言
session_start();
$name = $_SESSION["name"];

// 選択したレコードのidを受け取る
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ編集</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
    <!-- 前ページに戻る -->
    <a href="javascript:history.back();">一覧に戻る</a>
    <h2><i class="fa fa-paint-brush "></i> データ編集する</h2>
</div>

<!-- 既存レコード編集欄 -->
<form action="update.php" method="post">
    <fieldset>

        <!-- IDは変更できないようにreadonly入れる -->
        <label>ID：<input type="text" class="id" name="id" value="<?php echo $id ?>" readonly></label>
        
        <label>収支：
            <select name="balance">
                <option value="支出">支出</option>
                <option value="収入">収入</option>
            </select>
        </label>
        

        <label>項目名：
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

        <!-- 送信・リセットボタン -->
        <div>
            <input type="submit" value="更新する">
            <input type="reset" value="入力をリセットする">
        </div>
    </fieldset>
</form> 
<!-- mainここまで -->
</body>
</html>