<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
                                                <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Connexion au site</title>
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
            <div class="container">
              <div class="well">
                <div class="row">
                  Vous êtes déjà connecté, vous allez être redirigé vers votre profil dans 5 secondes.
                  <?php
                    header("refresh:5;url=profil.php");
                  ?>
                </div>
              </div>
            </div>
  <?php
          }
        else
          {
          include '/nav_non_connected.php';
  ?>
                                                  <!-- Fin de la barre de navigation -->
                                                  <!-- Début du contenu de la page -->
    <div class="container">
      <div class="well">
        <div class="row">
          <div class="col-md-offset-2 col-md-8">
            <h1>Connexion<br><small> Merci de rentrer vos identifiants</small></h1>
          </div>
        </div>

          <form method="POST" action="">

        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <div class="form-group">
              <label for="pseudoconnect">Pseudo</label>
              <input type="text" class="form-control" id="pseudoconnect" placeholder="Votre pseudo" name="pseudoconnect" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <div class="form-group">
              <label for="mdpconnect">Mot de passe</label>
              <input type="password" class="form-control" id="mdpconnect" name="mdpconnect" placeholder="Mot de passe">
            </div>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <input class="btn btn-success btn-block" type="submit" name="formconnect" value="Se connecter! &rpargt;" />
            <input class="btn btn-primary btn-block" type="submit" name="forminscription" value="Pas encore de compte? &rpargt;" />
          </div>  
        </div>
        <br>     
                                                  <!-- partie connexion PHP -->
    <?php
      $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
      if(isset($_POST['formconnect'])) {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $mdpconnect = sha1($_POST['mdpconnect']);
        if(!empty($_POST['pseudoconnect']) AND !empty($_POST['mdpconnect'])) {
          $requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
          $requser->execute(array($pseudoconnect, $mdpconnect));
          $userexist = $requser->rowCount();
          if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['idU'] = $userinfo['idU'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['prenom'] = $userinfo['prenomU'];
            $_SESSION['nom'] = $userinfo['nomU'];
            $_SESSION['ecole'] = $userinfo['ecoleU'];
            $_SESSION['statut'] = $userinfo['statut'];
            $_SESSION['skills'] = $userinfo['competences'];
            header("location: connected.php?id=".$_SESSION['idU']);
          }
          else {
            $erreur0 = "Pseudo et/ou mot de passe faux";
          }
        }
      else{
        $erreur1 = "Tous les champs doivent être complétés";
      }
      }
      if(isset($_POST['forminscription'])) {
        header("location: inscription.php");
  }
    ?>
                                                <!-- fin partie connexion PHP -->
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="TESTUN" class="hidden">
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oops!</strong> 
                  <?php
                    if(isset($erreur0)) {
                        echo $erreur0;
                  ?>   
                    <script>    document.getElementById("TESTUN").removeAttribute("class","hidden row") </script>
                  <?php
                           }
                  ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div id="TESTDEUX" class="hidden">
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oops!</strong> 
                <?php
                  if(isset($erreur1)) {
                      echo $erreur1;
                ?>   
                  <script>    document.getElementById("TESTDEUX").removeAttribute("class","hidden row") </script>
                <?php
                         }
                ?>
            </div>
          </div>
        </div>
      </div>
      </form>
  </div>
</div>
  <?php
    }
  ?>
                                              <!-- Fin du contenu de la page -->
                                              <!-- Inclusion js -->
                                              <!-- le premier est sûrement inutile -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
                                              <!-- fin inclusion js -->
  </body>
</html>