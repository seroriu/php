<div class="wrapper">
    <h1>登録情報の変更</h1>
    <form method="post" enctype="multipart/form-data">
        <p>アイコンの変更</p>
        <img class="circle" src="<?= $pic ?>">
        <input type="file" name="image" accept="image/png, image/jpeg"><br>
        <button><input class="btn btn-light"  type="submit" name="upload" value="変更"></button>
    </form>
    <p>
    <form action="setting.php" method="post">
        <label>名前：</label>
        <input value="<?= $user['name'] ?>" class="form-control" type="text" name="username" required>
        <label>プロフィール：</label>
        <textarea class="form-control" type="text" name="profile" maxlength="140"><?= $user['profile'] ?></textarea>
        <input class="btn btn-light" type="submit" value="変更">
    </form>
</p>
</div>