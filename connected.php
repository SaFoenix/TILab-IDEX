<?php
  session_start();
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');

  if (isset($_GET['idU']) AND ($_GET['idU'] > 0)) {
    $getid = intval($_GET['idU']);
    $requser = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
                                                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Redirection en cours</title>
                                                    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  </head>
  <body class="mybackground">
                                                    <!-- Barre de navigation -->
    <?php
          if (isset($_SESSION['idU']))
            {
              include '/nav_connected.php';
        ?>
                                                    <!-- Fin de la barre de navigation -->
                                                    <!-- Début du contenu de la page -->
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Vous êtes connecté en tant que : <?php echo $_SESSION['pseudo']; ?> <br/> <small> Vous pouvez continuer votre navigation</small></h1>
        </div>
      </div>
    <?php 
      if(isset($_SESSION['idU'])) {                   //  AND $userinfo['idU'] == $_SESSION['idU']
        ?>
Vous allez être redirigé dans 5 secondes
        <?php
      }
     ?>
                                                    <!-- partie connexion PHP -->
<?php header("refresh:5;url=index.php");
                                                    //<!-- fin partie connexion PHP -->
}
else{
  include '/nav_non_connected.php';
  ?>
  <div class="container">
    <div class="well">
  <?php
  echo 'Vous êtes déconnecté, vous allé être redirigé vers la page de connexion dans 5 secondes.';
  header("refresh:5;url=connexion.php");
}
?>
    </div>
  </div>
                                                    <!-- Fin du contenu de la page -->
                                                    <!-- Inclusion js -->
                                                    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
                                                    <!-- fin inclusion js -->
</body>
</html>