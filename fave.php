<?php
    if(isset($_POST["fave"])){
        $sql = 'INSERT INTO faves (fave, faved) VALUES (:fave, :faved)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':fave', $user['id'], PDO::PARAM_INT);
        $statement->bindValue(':faved', $_POST["fave"], PDO::PARAM_INT);
        $statement->execute();
        header('Location:' . $_SERVER['REQUEST_URI']);
		exit;
    }
    if(isset($_POST["unfave"])){
        $sql = 'DELETE FROM faves WHERE fave = :fave AND faved = :faved';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':fave', $user['id'], PDO::PARAM_INT);
        $statement->bindValue(':faved', $_POST["unfave"], PDO::PARAM_INT);
        $statement->execute();
        header('Location:' . $_SERVER['REQUEST_URI']);
		exit;
    }