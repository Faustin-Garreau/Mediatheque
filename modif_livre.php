<?php 
require_once('config.php');

$value_livre_id = $_GET['id'];
$value_livre = $dbh->prepare('SELECT * FROM livre WHERE id = ?');
$value_livre->execute(array($value_livre_id));
$value_livre = $value_livre->fetch();

if(isset($_POST['titre_livre_modif']) && isset($_POST['file_livre_modif']) && isset($_POST['description_livre_modif']) && isset($_POST['auteur_livre_modif']) && isset($_POST['genre_livre_modif']) && isset($_POST['date_parution_modif'])) {
    var_dump('je rentre');
    $edit_titre = htmlspecialchars($_POST['titre_livre_modif']);
    $edit_image = $_POST['file_livre_modif'];
    $edit_description = htmlspecialchars($_POST['description_livre_modif']);
    $edit_auteur = htmlspecialchars($_POST['auteur_livre_modif']);
    $edit_genre = htmlspecialchars($_POST['genre_livre_modif']);
    $edit_date_parution = $_POST['date_parution_modif'];

$update_livre = $dbh->prepare('UPDATE livre SET titre = ?, image = ?, description = ?, auteur = ?, genre = ?, date_parution = ? WHERE id = ?');
$update_livre->execute(array($edit_titre, $edit_image, $edit_description, $edit_auteur, $edit_genre, $edit_date_parution,  $_GET['id']));
header('location:livre.php');
}
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
<?php include('header.php') ?>
<?php if($_SESSION['admin'] == 1) { ?>
<body>
<section class="d-flex justify-content-center mt-5">
        <form action="modif_livre.php?id=<?=$_GET['id']?>" method="POST">
        <input type="text" placeholder="Titre" value="<?php if($value_livre['titre']) { echo $value_livre['titre']; }?>" name="titre_livre_modif" >
        <input type="file" name="file_livre_modif" >
        <input type="text" value="<?php if($value_livre['description']) { echo $value_livre['description']; }?>" placeholder="Description" name="description_livre_modif">
        <input type="text" value="<?php if($value_livre['auteur']) { echo $value_livre['auteur']; } ?>" placeholder="Auteur" name="auteur_livre_modif">
        <input type="text" value="<?php if($value_livre['genre']) { echo $value_livre['genre']; } ?>" placeholder="Genre" name="genre_livre_modif">
        <input type="date" value="<?= $value_livre['date_parution'] ?>" name="date_parution_modif">
        <input type="submit" placeholder="Envoyer">
        </form>
</section>
</body>
<?php } ?>
</html>