<?php
require_once 'db_connect.php';
$dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
$username = "root";
$password = "root";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    if (isset($user['image'])) {
        $pic = 'images/' . $user['image'];
    } else {
        $pic = 'images/noimage.jpg';
    }
    if (isset($_POST['username'])) {
        $sql = "UPDATE users SET name = :name WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $_POST['username']);
        $stmt->bindValue(':id', $user_id);
        $stmt->execute();
        $msg = '変更が完了しました';
        $link = '<a href="login.php">ログインページ</a>';
        header('Location: ./setting.php');
    }
    if (isset($_POST['profile'])) {
        $sql = "UPDATE users SET profile = :profile WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':profile', $_POST['profile']);
        $stmt->bindValue(':id', $user_id);
        $stmt->execute();
        $msg = '変更が完了しました';
        $link = '<a href="login.php">ログインページ</a>';
        header('Location: ./setting.php');
    }
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $extention = '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $sql = "INSERT INTO images(name) VALUES (:image)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            //move_uploaded_file($_FILES['image']['tmp_name'], './images/' . 'aa' . $extention);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','root');
                $sql = 'UPDATE users SET image = :pic WHERE id = :id';
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':id', $user_id);
                $statement->bindValue(':pic', $image);
                $statement->execute();
                header('Location: ./setting.php');
                exit;
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
    include 'views/header.tpl.php';
    require_once 'views/setting.tpl.php';
    include 'views/footer.tpl.php';