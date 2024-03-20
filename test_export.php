<?php
include "./api/db.php";
$rows = $Qt->all();
dd($rows);
?>
<table>
    <tr>
        <th>id</th>
        <th>貓咪小物</th>
        <th>玩具</th>
        <th>逗貓棒a</th>
        <th>貓跳台1.0</th>
        <th>貓跳台2.0</th>
        <th>貓窩</th>
        <th>背包</th>
        <th>逗貓棒b</th>
        <th>貓咪大背包</th>
        <th>會員帳號</th>
        <th>姓名</th>
        <th>會員電話</th>
        <th>會員地址</th>
        <th>總金額</th>
        <th>訂單編號</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <?php
            foreach ($row as $value) {
            ?>
                <td>
                    <?= $value ?>
                </td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table>