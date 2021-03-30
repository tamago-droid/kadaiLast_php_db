<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>
<body>
<h1>Sign Up</h1>
<div class="theme2">
    <a href="javascript:history.back();">サインインに戻る</a>
</div>
<form action="signup.php" method="post">
    <fieldset>
        <label>名前：
            <input type="text" name="name" autocomplete="off" required>
        </label>
        
        <label>メールアドレス：
                <input type="email" name="email" placeholder="info@test.test" autocomplete="off" required>
        </label>
            
        <label>パスワード：
            <input type="password" name="pass" required>
        </label>
        <div>
            <input type="submit" value="Signup">
            <input type="reset" value="Reset">
        </div>
    </fieldset>
</form>
    
</body>
</html>