<?php
require_once('config.php');
$del_user = $dbh->prepare("DELETE FROM user WHERE id = :id");
$del_user->bindParam(":id", $_GET['id']);
$del_user->execute();
header('location:user.php'); 
?>