<?php
require_once('config.php');

if(isset($_POST['mail_connect']) && isset($_POST['password_connect'])) {
    $mailconnect = htmlspecialchars($_POST['mail_connect']);
    $mdpconnect = sha1($_POST['password_connect']);


   $requser = $dbh->prepare("SELECT * FROM user WHERE email = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
		$userinfo = $requser->fetch();
        if ($userinfo['active'] == 1 || $userinfo['admin'] == 1) {
		$_SESSION['id'] = $userinfo['id'];
		$_SESSION['email'] = $userinfo['email'];
        $_SESSION['admin'] = $userinfo['admin'];
        $_SESSION['active'] = $userinfo['active'];
		$erreur_log = "connecté avec succès";
        header('location:livre.php');
        }else {
            $erreur_log ="Votre compte n'est pas activé";
        }
	  }else {
		  $erreur_log = "email ou mot de passe incorrect";
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
<body>
    <div class="d-flex justify-content-center align-center">
  <form class="form-horizontal" action="index.php" method="POST">
    <div class="form-group">
      <div>
        <input type="email" class="form-control" placeholder="Email" name="mail_connect" required>
      </div>
    </div>
    <div class="form-group">
      <div>          
        <input type="password" class="form-control"  placeholder="Mot de passe" name="password_connect" required>
      </div>
    </div>
    <div class="form-group">        
      <div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>