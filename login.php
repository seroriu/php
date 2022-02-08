<?php
require_once 'db_connect.php';
$mail = $_POST['mail'];
$dsn = "mysql:dbname=mydb;host=localhost;charset=utf8";
$username = "root";
$password = "root";
try {
    $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
    //$dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}

include 'views/header.tpl.php';
require_once 'views/login.tpl.php';
include 'views/footer.tpl.php';