<!DOCTYPE html>
<html lang='ja'>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<header>
    <h1>
        <a href="/">短文投稿サイト</a>
    </h1>
    <nav class="pc-nav">
        <ul>
            <?php if (isset($_SESSION['id'])) { ?>
                <li><a href="all.php">全ての投稿を表示</a></li>
                <li><a href="setting.php">登録情報の変更</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            <?php } else { ?>
                <li><a href="login_form.php">ログイン</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
<body>