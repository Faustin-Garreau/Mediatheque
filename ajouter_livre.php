<?php 
require_once('config.php');

if(isset($_POST['titre_livre_create']) && isset($_POST['file_livre_create']) && isset($_POST['description_livre_create']) && isset($_POST['auteur_livre_create']) && isset($_POST['genre_livre_create']) && isset($_POST['date_parution_create_livre'])) {
    var_dump('je rentre');
    $titre_create = htmlspecialchars($_POST['titre_livre_create']);
    $image_create = $_POST['file_livre_create'];
    $description_create = htmlspecialchars($_POST['description_livre_create']);
    $auteur_create = htmlspecialchars($_POST['auteur_livre_create']);
    $genre_create = htmlspecialchars($_POST['genre_livre_create']);
    $date_parution_create = $_POST['date_parution_create_livre'];
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
		$insert = $dbh->prepare("INSERT INTO livre(titre, image, description, auteur, genre, date_parution) VALUES(?, ?, ?, ?, ?, ?)");
		$insert->execute(array($titre_create, $image_create, $description_create, $auteur_create, $genre_create, $date_parution_create));
        $erreur = "livre créé avec succès";
		header('location:ajouter_livre.php');
	}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include('header.php'); ?>
<body>
<section>
        <form action="ajouter_livre.php" method="POST">
        <input type="text" placeholder="Titre" name="titre_livre_create" required>
        <input type="file" name="file_livre_create">
        <input type="text" placeholder="Description" name="description_livre_create" required>
        <input type="text" placeholder="Auteur" name="auteur_livre_create" required>
        <input type="text" placeholder="Genre" name="genre_livre_create" required>
        <input type="date" name="date_parution_create_livre" required>
        <input type="submit" placeholder="Envoyer">
        </form>
    </section>
</body>
</html>