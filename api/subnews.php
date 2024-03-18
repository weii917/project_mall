<?php include_once "db.php";

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $News->del($id);
        } else {
            $row = $News->find($id);
            $row['text'] = $_POST['text'][$idx];     
            $News->save($row);
        }
    }
}


if (isset($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {
        if ($text != "") {
            $data = [];
            $data['text'] = $text;
            $data['sh'] = 1;
            $data['news_id'] = $_POST['news_id'];

            $News->save($data);
        }
    }
}

to("../back.php?do=news");
