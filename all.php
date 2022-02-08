<?php
    require_once 'db_connect.php';
    require_once 'fave.php';
    $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','root');
    $sql = 'SELECT * FROM posts LEFT JOIN users ON users.id = posts.user_id';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row;
    }
    $marks = array();
    foreach ($results as $key => $row)
    {
        $marks[$key] = $row['post_id'];
    }
    array_multisort($marks, SORT_DESC, $results);
    $statement = null;
    $pdo = null;

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
    require_once 'views/all.tpl.php';
    include 'views/footer.tpl.php';