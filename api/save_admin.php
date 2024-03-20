<?php
include_once "db.php";
if (isset($_POST['id'])) {
    $_POST['pr'] = serialize($_POST['pr']);
    $Admin->save($_POST);
    to("../back.php?do=admin");
} else {
    if ($_POST['acc'] != 'admin' && $Admin->count(['acc' => $_POST['acc']]) != 1) {
        $_POST['pr'] = serialize($_POST['pr']);
        $Admin->save($_POST);
        to("../back.php?do=admin");
    } else {
        to("../back.php?do=admin&error=此帳號已被使用，請重新輸入");
    }
}
