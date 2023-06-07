<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.phpからの導線以外は、login_error.phpへリダイレクト
if(!empty($_POST['form_mypage'])){
    header("Location:login_error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mypage_hensyu.css">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>

<main>
    <form action="mypage_update.php" method="post">
        <div class="mypage">
            <div class="mypage_contents">
                <h2>会員情報</h2>
                <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>

                <div class="picture">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>

                <div class="info">
                    <p>氏名: <input type="text" name="name" size="30" value="<?php echo $_SESSION['name']; ?>"></p>
                    <p>メール: <input type="text" name="mail" size="30" value="<?php echo $_SESSION['mail']; ?>"></p>
                    <p>パスワード: <input type="text" name="password" size="30" value="<?php echo $_SESSION['password']; ?>"></p>
                </div>

                <div class="comments">
                    <textarea name="comments" cols="65" rows="5"><?php echo $_SESSION['comments']; ?></textarea>
                </div>

                <div class="submit">
                    <input type="submit" class="submit_button" value="この内容に変更する">
                </div>
            </div>
        </div>
    </form>
</main>

    <footer>
        &copy; 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>