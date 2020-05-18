<?php
require('../../connection/connection.php');
$sql = "DELETE FROM products WHERE productID=".$_GET['gproductID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list.php');
?>