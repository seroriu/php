<!-- 投稿内容の表示 -->
<?php foreach ($results as $post) { ?>
    <p>
        <div class="card">
            <div class="card-header">
            <!-- <?= $post["post_id"] ?> -->
            <img class="circle-small" src="images/<?= $post["image"] ?>"><a href="show.php?id=<?= $post["user_id"] ?>"><?= $post["name"] ?></a>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($post["content"], \ENT_QUOTES, 'UTF-8'); ?></h5>
                <div class="float-right">
                <ul>
                <!-- ログインしている場合のHTML -->
                <?php if(isset($user)) { ?>
                    <?php if ($_SESSION['id'] == $post["user_id"]) { ?>
                        <li>
                        <form action="" method="post" name="delete_form">
                            <input input type="hidden" name='delete' value='<?= $post["post_id"] ?>'>
                            <a href="#" onclick="document.delete_form.submit();">削除</a>
                        </form>
                        </li>
                    <?php } ?>
                    <?php } ?>
                <?php if (isset($_SESSION['id'])) { ?>
                    <li style="display: inline;">
                    <form action="" method="post">
                        <?php if(in_array($post["post_id"], array_column($faving, 'faved'))){ ?>
                            <input input type="hidden" name='unfave' value='<?= $post["post_id"] ?>'>
                            <input type="image" src="./images/faved.png" width="24" height="24">
                        <?php } else { ?>
                            <input input type="hidden" name='fave' value='<?= $post["post_id"] ?>'>
                            <input type="image" src="./images/fave.png" width="24" height="24">
                        <?php } ?>
                    </form>
                    </li>
                    <?php } ?>
                    <li style="display: inline;">
                        <?= $post["created"] ?></p>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </p>
<?php } ?>
