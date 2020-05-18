<?php require_once('../functions/login_check.php'); ?>
<?php 
require_once('../../connection/connection.php');
$sql = "DELETE FROM members_categories WHERE member_categoryID=".$_GET['gmember_categoryID'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list1.php');
?>