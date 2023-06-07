<?php
session_start();

//sessionを破棄する
session_destroy();

//ログインへ遷移
header("Location:login.php");

?>