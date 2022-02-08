<?php
    require_once 'db_connect.php';
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        //ini_set('display_errors', "On");
        $dsn = "mysql:dbname=mydb;host=localhost;charset=utf8";
        $username = "root";
        $password = "root";
        try {
            $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
            //$dbh = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $msg = $e->getMessage();
        }
        $sql = 'INSERT INTO posts (content,user_id) VALUES (:content,:user_id)';
        $statement = $dbh->prepare($sql);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        header('Location: ./');
        exit;
    }
    if (isset($_REQUEST['method'])) {
        $method = $_REQUEST['method'];
        if(strpos($method,'delete?id=') !== false){
            $num = substr($method , 10);
            $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
            $sql = 'DELETE FROM posts WHERE post_id = :id';
            $statement = $dbh->prepare($sql);
            $statement->bindValue(':id', $num, PDO::PARAM_INT);
            $statement->execute();
            header('Location: ./');
            exit;
        }
    }
    if (isset($_POST['add'])) {
        $msg = "登録しました";
    }
    include 'views/header.tpl.php';
    require_once 'views/index.tpl.php';
    require_once 'views/posts.tpl.php';
    include 'views/footer.tpl.php';