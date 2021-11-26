<?php 
require_once('config.php');
$reqlivre = $dbh->query("SELECT * FROM livre");
$livres  = $reqlivre->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php include('header.php'); ?>
<body>
    <section>
    <h1 class="text-center mt-5">Liste livres</h1>
    <section class="d-flex justify-content-evenly align-items-center w-100 mt-5">
        <?php foreach($livres as $livre) { ?>
            <div class="block">
                <p>Titre : <?= $livre['titre'] ?></p>
                <p>Description <?= $livre['description'] .' '. $user['prenom'] ?></p>
                <p>Auteur <?= $livre['auteur']?></p>
                <p>Date de parution : <?= $livre['date_parution'] ?></p>
                
                    <a href="active_desactive.php?id=<?=$user['id']?>&active=<?=$user['active']?>"><button type="button" class="btn btn-success">Reserver</button></a>
                    <a href="active_desactive.php?id=<?=$user['id']?>&active=<?=$user['active']?>"><button type="button" class="btn btn-danger">Ne plus reserver</button></a>
            </div>
            <?php } ?>
    </section>
    </section>
</body>
</html>