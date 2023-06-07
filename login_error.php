<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>ログイン</title>
</head>
<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">
                <h2>ログイン</h2>
                <div class="error_message">メールアドレスまたはパスワードが間違っています。</div>
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" name="mail" class="formbox" size="40">
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" name="passwords" class="formbox" size="40">
                </div>
                <div class="login_check">
                    <label>
                        <input type="checkbox" name="login_keep" size="40" class="formbox" value="login_keep">ログイン情報を保持する
                    </label>
                </div>
                <div class="login_button">
                    <input type="submit" value="ログインする" class="submit_button" size="35">
                </div>
            </div>
        </form>
    </main>

    <footer>
        &copy; 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>