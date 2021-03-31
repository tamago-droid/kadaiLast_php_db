<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>
<body>
<h1>Sign In</h1>
<div class="theme2">
    <a href="signup_form.php">新規登録はこちら</a>
</div>

<form action="login.php" method="post">
    <fieldset>  
        <!-- 登録ネーム -->
        <label for="name">名前：
            <input type="text" name="name" id="name" required>
        </label>
        
        
        <!-- パスワード -->
        <label for="pass">パスワード：
            <input type="password" name="pass" id="pass" required>
        </label>
        
        <div>
            <input type="submit" value="Signin">
            <input type="reset" value="Reset">
        </div>       
    </fieldset>

</form>

</body>
</html>