<?php
mb_internal_encoding("utf8");
session_start();

//session配列がなかった場合
if(empty($_SESSION['id'])){

    //try catch DBに接続できなければエラーメッセージ
    try{
    $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","");
    }catch(PDOException $e){
        die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインしてください。</p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
    }
    //prepared statementでSQL文の型を作る（DBとpostデータを照合させる。select文とwhere句を使用)
    $stmt = $pdo->prepare("select * from login_mypage where mail=? && password=?");

    //bindValueメソッドでパラメータをセット
    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);

    //executeでクエリを実行
    $stmt->execute();

    //データベースを切断
    $pdo = NULL;

    //fetch.while文でデータを取得、sessionに代入
    while($row = $stmt->fetch()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['comments'] = $row['comments'];
    }

    //データ取得できず(emptyで判定)sessionがなければ、リダイレクト（エラー画面へ）
    if(empty($_SESSION['id'])){
        header("Location:login_error.php");
    }

    //ログイン状態を保持するにチェックがあった場合、login_keepの値をsessionに保存
    if(!empty($_POST['login_keep'])){
        $_SESSION['login_keep'] = $_POST['login_keep'];
    }
}

//ログインに成功しているかつ、$_SESSION['login_keep']が空でない場合、Cookieにデータを保存 有効期限を7日に設定
if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);

//空の場合（チェックを入れていない場合）、Cookieのデータを削除する time()-1で過去の時間を設定
} else if(empty($_SESSION['login_keep'])){
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mypage.css">
    <title>マイページ</title>
</head>
<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>

    </header>

    <main>
        <div class="mypage">
            <div class="mypage_contents">
                <h2>会員情報</h2>
                <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>

                <div class="picture">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>

                <div class="info">
                    <p>氏名: <?php echo $_SESSION['name']; ?></p>
                    <p>メール: <?php echo $_SESSION['mail']; ?></p>
                    <p>パスワード: <?php echo $_SESSION['password']; ?></p>
                </div>

                <div class="comments">
                    <p><?php echo $_SESSION['comments']; ?></p>
                </div>

                <form action="mypage_hensyu.php" method="post" class="form_center">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="form_mypage">
                    <div class="buttons">
                        <div class="hensyu_button">
                            <a href="mypage_hensyu.php">編集する</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <footer>
        &copy; 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>