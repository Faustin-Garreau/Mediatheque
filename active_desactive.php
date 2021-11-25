<?php 
require_once('config.php');

if ($_GET['active'] == 0) {
    $update_user = $dbh->prepare('UPDATE user SET active = ? WHERE id = ?');
    $update_user->execute(array(1, $_GET['id']));
    header('location:user.php');
}else {
    $update_user = $dbh->prepare('UPDATE user SET active = ? WHERE id = ?');
    $update_user->execute(array(0, $_GET['id']));
    header('location:user.php');
}

?>
