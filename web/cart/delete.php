<?php
session_start();
$i = $_GET['cart_id'];
unset($_SESSION['Cart'][$i]);
$_SESSION['Cart'] = array_values($_SESSION['Cart']); //刪除後重新整理陣列

header('Location: ../basket.php?Del=true');          //跳轉回去basket.php
?>
