<?php
include_once "db.php";


$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['acc'] = $_SESSION['mem'];


$Order->save($_POST);


foreach ($_SESSION['cart'] as $id => $qt) {

    $row[$id] = $qt;
}
$row['acc'] = $_SESSION['mem'];
// $row['id'] = $no;
$row['name'] = $_POST['name'];
$row['addr'] = $_POST['addr'];
$row['tel'] = $_POST['tel'];
$row['total'] = $_POST['total'];
$row['orderno'] = $_POST['no'];
$Qt->save($row);

unset($_SESSION['cart']);



?>

<script>
    alert("訂購成功!\n感謝您的選購");
    location.href = "../index.php";
</script>