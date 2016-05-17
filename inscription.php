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
    <title>Inscription aux Fablabs</title>
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
          <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
        </div>
      </div>

        <form method="POST" action="">

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Votre pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
          </div>
        </div>
      </div>
      

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
          </div>
        </div>
      
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="ecoleU">Établissement</label>
<!--             <input type="text" class="form-control" id="ecoleU" placeholder="Votre établissement" name="ecoleU" value="<?php if(isset($ecoleU)) { echo $ecoleU; } ?>">
-->          <select class="form-control" name="ecoleU">
              <option value="Ensiacet" selected>Ensiacet</option> 
              <option value="Mines d'Albi">Mines d'Albi</option>
              <option value="INSA">INSA</option>
              <option value="UPS">Université toulouse III Paul Sabatier</option>
            </select>
          </div>
        </div>
      
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="statut">Statut</label>
<!--             <input type="text" class="form-control" id="statut" placeholder="Votre statut" name="statut" value="<?php if(isset($statut)) { echo $statut; } ?>">
 -->
              <select class="form-control" name="statut">
                <option value="étudiant" selected>étudiant</option> 
                <option value="professeur">professeur</option>
                <option value="administrateur">administrateur</option>
              </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" placeholder="Votre Email" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
          </div>
        </div>
      
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="mail2">Vérification Email</label>
            <input type="email" class="form-control" id="mail2" placeholder="Email" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
          </div>
        </div>

        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="mdp2">Vérification mot de passe</label>
            <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="Vérification mot de passe">
          </div>
        </div>
      </div>

      <br/>
      <div class="row">
        <div class="col-md-offset-4 col-md-4">
          <input id="TESTUN" type="submit" class="btn btn-primary btn-block" name="forminscription" value="Envoyer mes informations &raquo;">
        </div>
      </div>
      <br>
                                                <!-- partie inscription PHP -->
          <?php
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
            if(isset($_POST['forminscription'])) {
               $pseudo = htmlspecialchars($_POST['pseudo']);
               $prenomU = htmlspecialchars($_POST['prenom']);
               $nomU = htmlspecialchars($_POST['nom']);
               $ecoleU = htmlspecialchars($_POST['ecoleU']);
               $statut = htmlspecialchars($_POST['statut']);
               $mail = htmlspecialchars($_POST['mail']);
               $mail2 = htmlspecialchars($_POST['mail2']);
               $mdp = sha1($_POST['mdp']);
               $mdp2 = sha1($_POST['mdp2']);
               // $dateheure = NOW();
               if(!empty($_POST['pseudo']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['ecoleU']) AND !empty($_POST['statut']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
                  $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
                  $reqpseudo->execute(array($pseudo));
                  $pseudoexist = $reqpseudo->rowCount();
                  if ($pseudoexist == 0) {
                    $pseudolength = strlen($pseudo);
                    if($pseudolength <= 255) {
                       if($mail == $mail2) {
                          if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                             $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
                             $reqmail->execute(array($mail));
                             $mailexist = $reqmail->rowCount();
                             if($mailexist == 0) {
                                if($mdp == $mdp2) {
                                   $insertmbr = $bdd->prepare("INSERT INTO user(nomU, prenomU, mail, mdp, statut, pseudo, ecoleU, dateU) VALUES(?, ?, ?, ?, ?, ?, ?, NOW())");
                                   $insertmbr->execute(array($nomU, $prenomU, $mail, $mdp, $statut, $pseudo, $ecoleU));
                                   $resultat0 = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                } else {
                                   $resultat1 = "Vos mots de passes ne correspondent pas !";
                                }
                             } else {
                                $resultat1 = "Adresse mail déjà utilisée !";
                             }
                          } else {
                             $resultat1 = "Votre adresse mail n'est pas valide !";
                          }
                       } else {
                          $resultat1 = "Vos adresses mail ne correspondent pas !";
                       }
                    } else {
                       $resultat2 = "Votre pseudo ne doit pas dépasser 255 caractères !";
                    }
                  } else {
                    $resultat1 = "Pseudo déjà utilisé !";
                  }
               } else {
                  $resultat2 = "Tous les champs doivent être complétés !";
               }
            }
            ?>
                                                <!-- fin partie insc. php -->
            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTDEUX" class="hidden">
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> 
                      <?php
                              if(isset($resultat0)) {
                                  echo $resultat0;
                      ?>   
                              <script>    document.getElementById("TESTDEUX").removeAttribute("class","hidden row") </script>
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTTROIS" class="hidden">
                  <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Warning !</strong> 
                      <?php
                              if(isset($resultat1)) {
                                  echo $resultat1;
                      ?>   
                              <script>    document.getElementById("TESTTROIS").removeAttribute("class","hidden row") </script>
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTQUATRE" class="hidden">
                  <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Oops !</strong> 
                      <?php
                              if(isset($resultat2)) {
                                  echo $resultat2;
                      ?>   
                              <script>    document.getElementById("TESTQUATRE").removeAttribute("class","hidden row") </script>
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTQUATRE" class="hidden">
                  <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Wrong !</strong> 
                      <?php
                              if(isset($resultat2)) {
                                  echo $resultat2;
                      ?>   
                              <script>    document.getElementById("TESTQUATRE").removeAttribute("class","hidden row") </script>;
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                                <!-- Fin du contenu de la page -->
                                                <!-- Inclusion js -->
                                                <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
                                            <!-- fin inclusion js -->
    <!-- <button onclick="myFunction()">Activating the MATRICE</button>
<script>
function myFunction() {
    document.getElementById("TESTUN").removeAttribute("disabled", "disabled"); 
}
</script>
    <button onclick="myFunction2()">Desactivating the MATRICE</button>
<script>
function myFunction2() {
    document.getElementById("TESTUN").setAttribute("disabled", "disabled"); 
}
</script>
    <button onclick="myFunction3()">affiche!!</button>
<script>
function myFunction3() {
    document.getElementById("TESTDEUX").removeAttribute("class","hidden row"); 
}
</script>
    <button onclick="myFunction4()">cache!!</button>
<script>
function myFunction4() {
    document.getElementById("TESTDEUX").setAttribute("class", "hidden row"); 
}
</script> -->
<?php
  }
?>
</body>
</html>