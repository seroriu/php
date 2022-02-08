<div class="wrapper">
<?php foreach ($results as $post) { ?>
        <p>
            <div class="card">
            <div class="card-header">
            <!-- <?= $post["post_id"] ?> -->
            <img class="circle-small" src="images/<?= $post["image"] ?>"><a href="show.php?id=<?= $post["user_id"] ?>"><?= $post["name"] ?></a>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($post["content"], \ENT_QUOTES, 'UTF-8'); ?></h5>
                <p style="text-align: right;" class="card-text">
                <?php if (isset($_SESSION['id'])) { ?>
                <!-- ログインしている場合のHTML -->
                    <?php if ($_SESSION['id'] == $post["user_id"]) { ?>
                        <form method="POST" name="a_form" action="" style="display: inline">
                            <a href="index.php?method=delete?id=<?= $post["post_id"] ?>" style="text-align: right;" onclick="document.a_form.submit();">削除</a>
                        </form>
                    <?php } ?>
                <?php } ?><?= $post["created"] ?></p>
                
            </div>
            </div>
        </p>
<?php } ?>
</div>
