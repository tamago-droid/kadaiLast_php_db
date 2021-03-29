<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>会員登録する</h1>
<form action="signup.php" method="post">
    <div>
        <label>名前：<label>
        <input type="text" name="name" autocomplete="off" required>
    </div>

    <div>
        <label>メールアドレス：<label>
        <input type="email" name="email" placeholder="info@test.test" autocomplete="off" required>
    </div>

    <div>
        <label>パスワード：<label>
        <input type="password" name="pass" required>
    </div>

    <input type="submit" value="新規登録">
</form>
    
</body>
</html>