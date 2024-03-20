<!-- 12. 完成標題圖片編輯功能-->
<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {
        $row = $DB->find($id);
        if (isset($row['text'])) {
            $row['text'] = $_POST['text'][$key];
        }
        switch ($table) {
            case "title":
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                break;
            case "admin":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "menu":
                $row['href'] = $_POST['href'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

                break;
            case "book":
                $row['email'] = $_POST['email'][$key];
                $row['phone'] = $_POST['phone'][$key];
                $row['name'] = $_POST['name'][$key];
                $row['catname'] = $_POST['catname'][$key];
                $row['datein'] = $_POST['datein'][$key];
                $row['dateout'] = $_POST['dateout'][$key];
                $row['room'] = $_POST['room'][$key];
                $row['catnum'] = $_POST['catnum'][$key];
                $row['know'] = $_POST['know'][$key];
                $row['other'] = $_POST['other'][$key];

                break;
            case "room":
                $row['room'] = $_POST['room'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            default:
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }

        $DB->save($row);
    }
}
to("../back.php?do=$table");
