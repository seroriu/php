<?php foreach ($following as $post) { ?>
        <p>
        <div class="card">
        <div class="card-body">
        <img class="circle-small" src="images/<?= $post["image"] ?>"><a href="show.php?id=<?= $post["id"] ?>"><?= $post["name"] ?></a>
        </div>
        </div>
    </p>
<?php } ?>