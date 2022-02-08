<?php
    require_once 'db_connect.php';
    $_SESSION = array();//セッションの中身をすべて削除
    session_destroy();//セッションを破壊
    include 'views/header.tpl.php';
    require_once 'views/logout.tpl.php';
    include 'views/footer.tpl.php';