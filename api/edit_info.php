<!-- 7.負責total及bottom修改因他們都只有一筆沒有新增功能 -->
<?php
include_once "db.php";

//從點進來的地方附加隱藏的資料表名稱存進POST， 取得資料表名稱
//也取得db物件名稱要改成首字大寫
$table = $_POST['table'];
$DB = ${ucfirst($table)};

switch ($table) {
    case "total":
        // 從資料表撈出id為1的資料
        $data = $DB->find(1);
        // 將資料表對應的欄位修改成post過來的值，更新回資料表
        $data[$table] = $_POST[$table];
        $DB->save($data);
        break;
    case "bottom":
        $data1 = $DB->find(1);
        $data2 = $DB->find(2);
        $data3 = $DB->find(3);

        $data1[$table] = $_POST[$table][0];
        $data2[$table] = $_POST[$table][1];
        $data3[$table] = $_POST[$table][2];
        $DB->save($data1);
        $DB->save($data2);
        $DB->save($data3);
        break;
    case "address":
        unset($_POST['table']);
        // 將資料表對應的欄位修改成post過來的值，更新回資料表
        $DB->save($_POST);
        break;
}


// header("location:$url")的小function
// 導回total的頁面
to("../back.php?do=$table");


?>