<?php include_once "db.php";
$table = $_POST['table'];
unset($_POST['table']);
switch ($table) {
    case "admin":
        // 帳號密碼檢查
        if ($Admin->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]) > 0) {
            $_SESSION['admin'] = $_POST['acc'];
            to("../back.php");
        } else {
            to("../front/login.php?error=帳號密碼錯誤");
        }
        break;
    case "book":
        if (!empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['name']) && !empty($_POST['catname']) && !empty($_POST['datein']) && !empty($_POST['dateout'])) {
            $_SESSION['book'] = '預約成功，我們會於二十四小時之內與您聯繫';;
            $Book->save($_POST);
            to("../index.php");
        } else {
            to("../front/book.php?error=請填寫完整");
        }


        break;
    case "mem":
        if ($Mem->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]) > 0) {
            $_SESSION['mem'] = $_POST['acc'];
            to("../back.php");
        } else {
            to("../front/login.php?error=帳號密碼錯誤");
        }
        break;
}
