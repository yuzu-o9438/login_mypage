<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>マイページ登録</title>
</head>
<body>
    <header>
        <img src="image/4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <!--ファイルをアップロードする -->
        <form action="register_confirm.php" method="post" enctype="multipart/form-data">
            <div class="form_contents">
                <h2>会員登録</h2>
                <div class="name">
                    <div class="hissu">必須</div><label>氏名</label><br>
                    <!--フォームを必須項目にする required -->
                        <input type="text" class="formbox"  size="40" name="name" required>
                </div>

                <div class="mail">
                    <div class="hissu">必須</div><label>メールアドレス</label><br>
                    <!--バリデーション pattern -->
                        <input type="text" class="formbox"  size="40" name="mail" pattern="^[a-z0-9._%+-]+@[.a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>

                <div class="password">
                    <div class="hissu">必須</div><label>パスワード（半角英数字6文字以上）</label><br>
                        <input type="password" class="formbox"  size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>

                <div class="password">
                    <div class="hissu">必須</div><label>パスワード確認</label><br>
                    <!--パスワード確認チェック-->
                        <input type="password" class="formbox"  size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
                </div>

                <div class="picture">
                    <label>プロフィール写真</label><br>
                    <!--ファイルの容量の上限を決める required -->
                        <input type="hidden" name="max_file_size" value="1000000">
                        <input type="file" name="picture" size="40">
                </div>

                <div class="comments">
                    <label>コメント</label><br>
                    <textarea name="comments" cols="45" rows="5"></textarea>
                </div>

                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="登録する">
                </div>
            </div>
        </form>
    </main>

    <footer>
        &copy; 2018 InterNous.inc. All rights reserved
    </footer>

    <script>
        //パスワード確認
        function ConfirmPassword(confirm){
            var input1 = password.value; //id=passwordに入力されたもの
            var input2 = confirm.value;  //id=confirmに入力されたもの
            if(input1 != input2){
                //バリデーション機能 setCustomValidity()
                confirm.setCustomValidity("パスワードが一致しません。");
            }else{
                confirm.setCustomValidity("");
            }
        }
    </script>
    
</body>
</html>