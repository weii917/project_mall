<?php
session_start();

unset($_SESSION['mem'], $_SESSION['admin']);
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
header('location:../index.php');
