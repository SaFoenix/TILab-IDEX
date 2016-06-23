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
<!--  <form method="POST" action="">
        <br>
        <!-- <div class="row">
          <div class="col-md-offset-2 col-md-3">
            <form method="POST" action="">
              <div class="form-group">
                <label for="newpseudo">Pseudo</label>
                <input type="text" class="form-control" id="newpseudo" placeholder="Votre pseudo" name="pseudo" value="?= $resuserinfo['pseudo']; ?>" enabled>
              </div>
            </form>
          </div>
          <div class="col-md-offset-0 col-md-2">
<br>            <button class="btn btn-primary btn-block" onclick="mPseudo()">Modifier pseudo &rpargt;</button>
          </div> 
        </div> -->

        <div class="row">
          <form method="POST" action="">
            <div class="col-md-offset-2 col-md-3">
              <div class="form-group">
                <label for="newmail">Email</label>
                <input type="email" class="form-control" id="newmail" placeholder="Votre Email" name="newmail" value="<?php echo $resuserinfo['mail']; ?>" enabled>
              </div>
            </div>

            <div class="col-md-offset-0 col-md-3">

              <div class="form-group">
                <label for="newmail2">Vérification Email</label>
                <input type="text" class="form-control" id="newmail2" placeholder="Confirmation Email" name="newmail2" value="<?php echo $resuserinfo['mail']; ?>" enabled>
              </div>
            </div>

            <div class="col-md-offset-0 col-md-2">
  <br>        <input type="submit" class="btn btn-primary btn-block" name="formmail" value="Modifier mail &rpargt;">
            </div>

          </form>
        </div>

        <div class="row">
          <form method="POST" action="">
            <div class="col-md-offset-2 col-md-3">

              <div class="form-group">
                <label for="newmdp">Mot de passe</label>
                <input type="password" class="form-control" id="newmdp" name="newmdp" placeholder="Mot de passe" enabled>
              </div>
            </div>
            
            <div class="col-md-offset-0 col-md-3">
              <div class="form-group">
                <label for="newmdp2">Vérification mot de passe</label>
                <input type="password" class="form-control" id="newmdp2" name="newmdp2" placeholder="Vérification mot de passe" enabled>
              </div>
            </div>

            <div class="col-md-offset-0 col-md-2">
  <br>        <input type="submit" class="btn btn-primary btn-block" name="formmdp" value="Modifier mdp &rpargt;">
            </div>

          </form>
        </div>

<!--         <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <input id="TESTUN" type="submit" class="btn btn-primary btn-block" name="forminscription" value="Modifier mdp &rpargt;">
          </div>
        </div>
 -->


      <!-- </form> -->



    </div>
  </div>

  <?php
    if(isset($_POST['formmail'])) {
      $mail = htmlspecialchars($_POST['newmail']);
      $mail2 = htmlspecialchars($_POST['newmail2']);
        if( !empty($_POST['newmail']) AND !empty($_POST['newmail2'])) {
          if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
              $reqmail->execute(array($mail));
              $mailexist = $reqmail->rowCount();
              if($mailexist == 0) {
                $updatemail = $bdd->prepare("UPDATE user SET mail = ? WHERE idU = ?");
                $updatemail->execute(array($mail, $_SESSION['idU']));
                $error = "Votre mail a bien été mis à jour !";
              
              }

            }

          }

        }

      }

      if(isset($_POST['formmdp'])){
        $newmdp = sha1($_POST['newmdp']);
        $newmdp2 = sha1($_POST['newmdp2']);
          if( !empty($_POST['newmdp']) AND !empty($_POST['newmdp2'])) {
            if($newmdp == $newmdp2) {
                $updatemdp = $bdd->prepare("UPDATE user SET mdp = ? WHERE idU = ?");
                $updatemdp->execute(array($newmdp, $_SESSION['idU']));
                $error = "Votre mot de passe a bien été mis à jour !";
          }

        }

      }
                   if(isset($error)) {
                      echo '<span style="color:green">' .$error.'</span>';
                      }
                    
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


<!-- <div class="container">
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
 -->

</body>
</html>