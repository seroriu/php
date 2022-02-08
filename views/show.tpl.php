<div class="wrapper">
<img class="circle" src="images/<?= $showuser['image'] ?>"> <?= $showuser['name'] ?>
<p><?= $showuser['profile'] ?></p>
<?php if(isset($user)) { ?>
    <form action="" method="post">
        <?php if(in_array( $id, array_column( $following, 'followed'))){ ?>
            <input type="submit" name="unfollow" value="フォロー解除" type="button" class="btn btn-outline-dark">
        <?php } else { ?>
            <input type="submit" name="follow" value="フォロー" type="button" class="btn btn-light">
        <?php } ?>
    </form>
<?php } ?>