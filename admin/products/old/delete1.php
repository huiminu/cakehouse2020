<?php 
require_once('../../connection/connection.php');
$sql = "DELETE FROM products WHERE productID=".$_GET['gproductID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list1.php');
?>