<div class="wrapper">
<?php if(isset($user)) { ?>
    <?= '<p>こんにちは、' . htmlspecialchars($user['name'], \ENT_QUOTES, 'UTF-8') . 'さん</p>' ?> 
    <p>フォロー中のユーザーの投稿を表示しています。</p>
    <form action="index.php" method="post">
    <div>
        <label>本文：</label>
        <textarea class="form-control" name="content"></textarea> 
    <input class="btn btn-light" type="submit" value="投稿">
    </form>
<?php } else { ?>
    投稿するには<a href='login_form.php' class="cl">ログイン</a>してください
<?php } ?>
</div>

