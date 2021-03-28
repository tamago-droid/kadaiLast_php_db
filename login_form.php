<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>
    <h1>ログインする</h1>
    <form action="login.php" method="post">
        <!-- 登録ネーム -->
        <div>
            <label for="name">name.</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- パスワード -->
        <div>
            <label for="pass">pass.</label>
            <input type="text" name="pass" id="pass" autocomplete="off"　required>
        </div>

        <div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>


    </form>
</body>
</html>