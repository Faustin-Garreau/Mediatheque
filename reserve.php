<?php 
require_once('config.php');
if ($_GET['emprunte'] == 0) {
    $update_livre = $dbh->prepare('UPDATE livre SET emprunte = ?, user_id_emprunte = ?, date_emprunte = NOW() WHERE id = ?');
    $update_livre->execute(array(1, $_SESSION['id'], $_GET['id']));
    header('location:livre.php');
}else{
    $update_livre = $dbh->prepare('UPDATE livre SET emprunte = ?, user_id_emprunte = NULL, date_emprunte = NOW() WHERE id = ?');
    $update_livre->execute(array(0, $_GET['id']));
    if($_SESSION['admin'] == 1 ) {
    header('location:livre_emprunte.php');
    }else {
        header('location:livre.php');
    }
}

?>