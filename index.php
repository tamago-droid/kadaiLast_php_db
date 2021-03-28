<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿</title>
</head>
<body>
<!-- ここからheader -->
<header>
    <nav>
        <a href="expenses.php">すべての支出</a>
        <a href="incomes.php">すべての収入</a>
    </nav>
</header>
<!-- headerここまで -->

<!-- ここからmain -->
   <h1>家計簿</h1>
<form action="insert.php" method="post">
    <fieldset>
        <legend>入力する</legend>
        <!-- <label>名前：<input type="text" name="name" required></label> -->

        <label>
            <select name="balance" id="">
                <option value="収入">収入</option>
                <option value="支出">支出</option>
            </select>
        </label>

        <label>
            <select name="item" id="">
                <option value="食費">食費</option>
                <option value="水道光熱費">水道光熱費</option>
                <option value="住居費">住居費</option>
                <option value="日用雑費">日用雑費</option>
                <option value="給与">給与</option>
                <option value="ボーナス">ボーナス</option>
                <option value="その他">その他</option>
            </select>
        </label>

        <label>金額：<input type="text" name="howmuch" required></label>

        <div>
            <input type="submit" value="送信する">
            <input type="reset" value="入力をリセットする">
        </div>
    </fieldset>
</form> 
<!-- mainここまで -->
</body>
</html>