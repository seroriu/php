<?php
    if (isset($_REQUEST['delete'])) {
        echo '<script>alert("ようこそのWebの世界へ")</script>';
            $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
            $sql = 'DELETE FROM posts WHERE post_id = :id';
            $statement = $dbh->prepare($sql);
            $statement->bindValue(':id', $_POST["delete"], PDO::PARAM_INT);
            $statement->execute();
            header('Location: ./');
            exit;
    }
