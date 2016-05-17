<?php
  session_start();
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
    <title>Edition du profil</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">


</head>
<body class="mybackground">
  
    <!-- Barre de navigation -->

<?php if (isset($_SESSION['idU']))
  { 
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
    $requserinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
    $requserinfo->execute(array($_SESSION['idU']));
    $resuserinfo = $requserinfo->fetch();
    include '/nav_connected.php';
?>
    <!-- Fin de la barre de navigation -->
    <!-- Début du contenu de la page -->
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Votre profil<br> <small> Vous pouvez changer vos informations personnelles</small></h1>
        </div>
      </div>
<!--  <form method="POST" action=""> -->
        <br>
        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <form method="POST" action="">
              <div class="form-group">
                <label for="newpseudo">Pseudo</label>
                <input type="text" class="form-control" id="newpseudo" placeholder="Votre pseudo" name="pseudo" value="<?php echo $resuserinfo['pseudo']; ?>" disabled>
              </div>
            </form>
          </div>
          <div class="col-md-offset-0 col-md-2">
<br>            <button class="btn btn-primary btn-block" onclick="mPseudo()">Modifier pseudo &raquo;</button>
          </div> 
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <form method="POST" action="">

            <div class="form-group">
              <label for="newmail">Email</label>
              <input type="email" class="form-control" id="newmail" placeholder="Votre Email" name="newmail" value="<?php echo $resuserinfo['mail']; ?>" disabled>
            </div>
            </form>
          </div>

          <div class="col-md-offset-0 col-md-2">
<br>            <button class="btn btn-primary btn-block" onclick="mMail()">Modifier mail &raquo;</button>
          </div> 

          <div class="col-md-offset-0 col-md-3">
            <form method="POST" action="">

            <div class="form-group">
              <label for="newmail2">Vérification Email</label>
              <input type="text" class="form-control" id="newmail2" placeholder="Confirmation Email" name="newmail2" value="<?php echo $resuserinfo['mail']; ?>" disabled>
            </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <form method="POST" action="">

            <div class="form-group">
              <label for="newmdp">Mot de passe</label>
              <input type="password" class="form-control" id="newmdp" name="newmdp" placeholder="Mot de passe" disabled>
            </div>
            </form>
          </div>
          
          <div class="col-md-offset-0 col-md-2">
<br>            <button class="btn btn-primary btn-block" onclick="mMdp()">Modifier mdp &raquo;</button>
          </div>

          <div class="col-md-offset-0 col-md-3">
            <form method="POST" action="">

            <div class="form-group">
              <label for="newmdp2">Vérification mot de passe</label>
              <input type="password" class="form-control" id="newmdp2" name="newmdp2" placeholder="Vérification mot de passe" disabled>
            </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <input id="TESTUN" type="submit" class="btn btn-primary btn-block" name="forminscription" value="Envoyer mes informations &raquo;">
          </div>
        </div>



      <!-- </form> -->



    </div>
  </div>
        <?php
    }

    else
    {
      ?>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Accueil</a>
      </div>
      <ul class="nav navbar-nav">
      <li><a href="forum_categorie.php">Forum</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">Nos Fablabs<span class="caret">
           </span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.ensiacet.fr/fr/index.html" target="_blank">ENSIACET</a></li>
            <li><a href="http://www.mines-albi.fr/" target="_blank">Mines d'Albi</a></li>
            <li><a href="http://www.insa-toulouse.fr/fr/index.html" target="_blank">INSA Toulouse</a></li>
            <li><a href="http://www.univ-tlse3.fr/" target="_blank">Université Toulouse III</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
      </ul>
    </div>
  </div>
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


<div class="container">
  <div class="well">


    <button class="btn btn-primary btn-block" onclick="myFunction()">Activating the MATRICE</button>

<script>
function myFunction() {
    var x = document.getElementsByClassName("form-control");
    x[0].removeAttribute("disabled", "disabled");
    x[1].removeAttribute("disabled", "disabled");
    x[2].removeAttribute("disabled", "disabled");
    x[3].removeAttribute("disabled", "disabled");
    x[4].removeAttribute("disabled", "disabled");}
</script>


    <button class="btn btn-primary btn-block" onclick="myFunction2()">Desactivating the MATRICE</button>

<script>
function myFunction2() {
    var x = document.getElementsByClassName("form-control");
    x[0].setAttribute("disabled", "disabled");
    x[1].setAttribute("disabled", "disabled");
    x[2].setAttribute("disabled", "disabled");
    x[3].setAttribute("disabled", "disabled");
    x[4].setAttribute("disabled", "disabled");
}
</script>


<script>
function mPseudo() {
    var x = document.getElementsByClassName("form-control");
    x[0].removeAttribute("disabled", "disabled");}
</script>

<script>
function mPseudo2() {
    var x = document.getElementsByClassName("form-control");
    x[0].setAttribute("disabled", "disabled");}
</script>

<script>
function mMail() {
    var x = document.getElementsByClassName("form-control");
    x[1].removeAttribute("disabled", "disabled");
    x[2].removeAttribute("disabled", "disabled");
}
</script>

<script>
function mMdp() {
    var x = document.getElementsByClassName("form-control");
    x[3].removeAttribute("disabled", "disabled");
    x[4].removeAttribute("disabled", "disabled");
}
</script>



</div>
</div>


</body>
</html>