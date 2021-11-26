<?php
require_once('config.php');

if(isset($_POST['nom_create']) && isset($_POST['prenom_create']) && isset($_POST['email_create']) && isset($_POST['password_create']) && isset($_POST['date_create'])) {
    
    $nom = htmlspecialchars($_POST['nom_create']);
    $prenom = htmlspecialchars($_POST['prenom_create']);
    $email = htmlspecialchars($_POST['email_create']);
    $adresse = htmlspecialchars($_POST['adresse_create']);
    $mdp = sha1($_POST['password_create']);
    $date = $_POST['date_create'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$erreur = "Adresse mail invalide";
	}

	$count_mail = $dbh->prepare('SELECT count(*) FROM user WHERE email = ?');
	$count_mail->execute(array($email));
	$mail_count = $count_mail->fetch()['0'];
	if($mail_count == 0) {
		$insert = $dbh->prepare("INSERT INTO user(nom, prenom, email, adresse_postale, mdp, date_naissance) VALUES(?, ?, ?, ?, ?, ?)");
		$insert->execute(array($nom, $prenom, $email, $adresse, $mdp, $date));
		$erreur = "Votre compte a bien été créé !";
		header('location:index.php');
	}else {
		$erreur = "le mail est déjà utilisés !";
	}
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body class="d-flex justify-content-center">
    <section >
        <form action="create.php" method="POST">
            <input type="text" placeholder="Nom" name="nom_create" required>
            <input type="text" placeholder="Prenom" name="prenom_create" required>
            <input type="email" placeholder="Email" name="email_create" required>
            <input type="text" placeholder="Aresse Postale" name="adresse_create" required>
            <input type="password" placeholder="Mot de passe" name="password_create" required>
            <input type="date" placeholder="Date de naissance" name="date_create" required>
            <input type="submit" placeholder="Envoyer">
        </form>
        <a href="index.php">Déjà un compte ? Cliquez ici</a>
    </section>
</body>