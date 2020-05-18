<?php require_once('../functions/login_check.php'); ?>
<?php 
require_once('../../connection/connection.php');
$sql = "DELETE FROM members WHERE memberID=".$_GET['gmemberID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list1.php');
?>