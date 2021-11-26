<?php 
require_once('config.php');

$requser = $dbh->query("SELECT * FROM user");
$users  = $requser->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php include('header.php');
if($_SESSION['admin'] == 1) {
?>
<body>
    <h1 class="text-center mt-5">Liste utilisateurs</h1>
    <section class="d-flex justify-content-evenly align-items-center flex-wrap w-100">
        <?php foreach($users as $user) { ?>
            <div class="block text-white mt-5">
                <p>Mail : <?= $user['email'] ?></p>
                <p>Nom et Prenom : <?= $user['nom'] .' '. $user['prenom'] ?></p>
                <p>Date de naissance : <?= $user['date_naissance'] ?></p>
                
                <?php if($user['admin'] == 0) {
                    if($user['active'] == 0){?>
                        <a href="active_desactive.php?id=<?=$user['id']?>&active=<?=$user['active']?>"><button type="button" class="btn btn-success">Activer</button></a>
                <?php }
                else {?>
                    <a href="active_desactive.php?id=<?=$user['id']?>&active=<?=$user['active']?>"><button type="button" class="btn btn-danger">Desactiver</button></a>
                <?php } 
                }?>
                <a href="delete_user.php?id=<?= $user['id'] ?>"><button type="button" class="btn btn-warning">Supprimer</button></a>
            </div>
        <?php } ?>
    </section>
</body>
<?php } ?>
</html>