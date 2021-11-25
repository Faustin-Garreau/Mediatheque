<?php 
require_once('config.php');

$del_livre = $dbh->prepare("DELETE FROM livre WHERE id = :id");
$del_livre->bindParam(":id", $_GET['id']);
$del_livre->execute();
header('location:livre.php'); 
?>