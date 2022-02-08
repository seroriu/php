<?php
    require_once 'db_connect.php';
    //フォームからの値をそれぞれ変数に代入
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $dsn = "mysql:dbname=mydb;host=localhost;charset=utf8";
    $username = "root";
    $password = "root";
    try {
        $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
        //$dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
    }

    //フォームに入力されたmailがすでに登録されていないかチェック
    $sql = 'SELECT * FROM users WHERE mail = :mail';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $member = $stmt->fetch();
    if ($member['mail'] == $mail) {
        $msg = '同じIDが存在します。';
        $link = '<a href="signup.php">戻る</a>';
    } else {
        //登録されていなければinsert 
        $sql = "INSERT INTO users(name, mail, pass,profile,image) VALUES (:name, :mail, :pass,:profile,:image)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':pass', $pass);
        $stmt->bindValue(':profile', '');
        $stmt->bindValue(':image', 'noimage.jpg');
        $stmt->execute();
        $msg = '会員登録が完了しました';
        $link = '<a href="login.php" class="cl">ログインページ</a>';
    }
    include 'views/header.tpl.php';
    require_once 'views/register.tpl.php';
    include 'views/footer.tpl.php';