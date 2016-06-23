<?php
  session_start();
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
?>
<!DOCTYPE html>
  <?php
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Votre profil</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body class="mybackground">
    <!-- Barre de navigation -->
<?php if (isset($_SESSION['idU']))
  {
    include '/nav_connected.php'; ?>

    <!-- Fin de la barre de navigation -->
    <!-- Début du contenu de la page -->
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Votre profil<br> <small> Vous pouvez changer vos informations personnelles</small></h1>
        </div>
      </div>

        <br>
            <form method="POST" action="">
        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="newpseudo">Pseudo</label>
              <input type="text" class="form-control" id="newpseudo" placeholder="Votre pseudo" name="pseudo" value="<?= $_SESSION['pseudo']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" class="form-control" id="prenom" placeholder="Votre prénom" name="prenom" value="<?= $_SESSION['prenom']?>" disabled>
            </div>
          </div>

          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom" value="<?= $_SESSION['nom']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="etablissement">Etablissement</label>
              <input type="text" class="form-control" id="etablissement" placeholder="Votre établissement" name="etablissement" value="<?= $_SESSION['ecole']?>" disabled>
            </div>
          </div>

          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="statut">Statut</label>
              <input type="text" class="form-control" id="statut" placeholder="Votre statut" name="statut" value="<?= $_SESSION['statut']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="newmail">Email</label>
              <input type="email" class="form-control" id="newmail" placeholder="Votre Email" name="newmail" value="<?= $_SESSION['mail']; ?>" disabled>
            </div>
          </div>

          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="newmail2">Vérification Email</label>
              <input type="text" class="form-control" id="newmail2" placeholder="Confirmation Email" name="newmail2" value="<?= $_SESSION['mail']; ?>" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="newmdp">Mot de passe</label>
              <input type="password" class="form-control" id="newmdp" name="newmdp" placeholder="Mot de passe" disabled>
            </div>
          </div>
          
          <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
              <label for="newmdp2">Vérification mot de passe</label>
              <input type="password" class="form-control" id="newmdp2" name="newmdp2" placeholder="Vérification mot de passe" disabled>
            </div>
          </div>
        </div>

        <a href="editprofil.php">Editer mon profil</a>
        <br>
        <?php
    }
    else
    {
    include '/nav_non_connected.php';
  ?>
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> pour accéder à votre profil <br>Redirection dans 5 secondes </small></h1>
        </div>
      </div>
      </div>
      </div>
<?php
header("refresh:5;url=connexion.php");
        }
?>
<!-- partie connexion PHP -->
<!-- fin partie connexion PHP -->
<!-- Fin du contenu de la page -->
<!-- Inclusion js -->

    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

<!-- fin inclusion js -->

  </body>
</html>