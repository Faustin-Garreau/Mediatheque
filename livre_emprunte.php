<?php 
require('config.php');
$reqlivre_emprunte = $dbh->query("SELECT * FROM livre WHERE emprunte = 1");
$livres_empruntes  = $reqlivre_emprunte->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php include('header.php'); ?>
<?php if($_SESSION['admin'] == 1) { ?>
<body>
<h1 class="text-center mt-5">Livres empruntés</h1>
    <section class="d-flex justify-content-evenly flex-wrap align-items-center ">
        <?php foreach($livres_empruntes as $livres_emprunte) { ?>
            <div class="block_livre text-white mt-5">
                <p>Titre : <?= $livres_emprunte['titre'] ?></p>
                <p>Description : <?= $livres_emprunte['description']; ?></p>
                <p>Auteur : <?= $livres_emprunte['auteur']?></p>
                <p>Date de parution : <?= $livres_emprunte['date_parution'] ?></p>
                <a href="reserve.php?id=<?=$livres_emprunte['id']?>&emprunte=<?=$livres_emprunte['emprunte']?>"><button type="button" class="btn btn-danger">Ne plus reserver</button></a>
            </div>
            <?php } ?>
    </section>
</body>
<?php } ?>
</html>