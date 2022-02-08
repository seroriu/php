<?php
    require_once 'db_connect.php';
    require_once 'fave.php';
    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
        $sql = 'SELECT * FROM users WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $showuser = $statement->fetch(PDO::FETCH_ASSOC);
        $sql = 'SELECT * FROM posts LEFT JOIN users ON users.id = posts.user_id WHERE user_id = :user_id';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user_id', $id);
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
    }
    if(isset($_POST["follow"])){
        $sql = 'INSERT INTO follow (follower, followed) VALUES (:follower, :followed)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':follower', $user['id'], PDO::PARAM_INT);
        $statement->bindValue(':followed', $id, PDO::PARAM_INT);
        $statement->execute();
        header('Location:' . $_SERVER['REQUEST_URI']);
		exit;
    }
    if(isset($_POST["unfollow"])){
        $sql = 'DELETE FROM follow WHERE follower = :follower AND followed = :followed';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':follower', $user['id'], PDO::PARAM_INT);
        $statement->bindValue(':followed', $id, PDO::PARAM_INT);
        $statement->execute();
        header('Location:' . $_SERVER['REQUEST_URI']);
		exit;
    }
    include 'views/header.tpl.php';
    require_once 'views/show.tpl.php';
    require_once 'views/posts.tpl.php';
    include 'views/footer.tpl.php';
