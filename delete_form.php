<?php
    require_once 'db_connect.php';
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    }
    echo $results
    //$post = $results[$id, 'post_id']
    include 'views/header.tpl.php';
    //require_once 'views/delete_form.tpl.php';
    include 'views/footer.tpl.php';