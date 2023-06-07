<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得、事前に画像を格納する[image]という名のフォルダを作成しておく
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイルで移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register_confirm.css">
    <title>マイページ登録確認</title>
</head>
<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
    </header>

    <main>
        <div class="confirm">
            <div class="form_contents">
                <h2>会員登録 確認</h2>
                <p>こちらの内容で登録してもよろしいでしょうか？</p>

                <div class="name">
                    氏名: <?php echo $_POST['name']; ?>
                </div>
                <div class="mail">
                    メール: <?php echo $_POST['mail']; ?>
                </div>
                <div class="password">
                    パスワード: <?php echo $_POST['password']; ?>
                </div>
                <div class="picture">
                    プロフィール写真: <?php echo $_FILES['picture']['name']; ?>
                </div>
                <div class="comments">
                    コメント: <?php echo $_POST['comments']; ?>
                </div>

                <div class="buttons">
                    <div class="back_button">
                        <a href="register.php">戻って修正する</a>
                    </div>
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="submit" class="submit_button" value="登録する">
                            <input type="hidden" name="name" value="<?php echo $_POST['name'];?>">
                            <input type="hidden" name="mail" value="<?php echo $_POST['mail'];?>">
                            <input type="hidden" name="password" value="<?php echo $_POST['password'];?>">
                            <input type="hidden" name="path_filename" value="<?php echo $path_filename;?>">
                            <input type="hidden" name="comments" value="<?php echo $_POST['comments'];?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>