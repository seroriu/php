<div class="wrapper">
    <h1>新規会員登録</h1>
    <div>
    <form action="register.php" method="post">
        <label>名前：</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>ID：</label>
        <input type="text" name="mail" required>
    </div>
    <div>
        <label>パスワード：</label>
        <input type="password" name="pass" required>
    </div>
    <input class="btn btn-light" type="submit" value="新規登録">
    </form>
    <p>すでに登録済みの方は<a href="login_form.php" class="cl">こちら</a></p>
</div>