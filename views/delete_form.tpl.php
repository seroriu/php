<p>
    <div class="card">
    <div class="card-header">
    <?= $post["post_id"] ?> 
    <a href="show.php?id=<?= $post["user_id"] ?>"><?= $post["name"] ?></a>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($post["content"], \ENT_QUOTES, 'UTF-8'); ?></h5>
        <p style="text-align: right;" class="card-text">
        <?php if (isset($_SESSION['id'])) { ?>
        <!-- ログインしている場合のHTML -->
            <?php if ($_SESSION['id'] == $post["user_id"]) { ?>
                <a href="delete_form.php?id=<?= $post["post_id"] ?>">削除</a>
            <?php } ?>
        <?php } ?><?= $post["created"] ?></p>
        
    </div>
    </div>
</p>