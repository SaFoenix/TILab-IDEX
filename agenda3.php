<?php
  session_start();
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
                                                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <title>Projets des Fablabs</title>
                                                    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="font_awesome/css/font_awesome.min.css" rel="stylesheet">


  </head>
<body class="mybackground">
<?php
    if(isset($_SESSION['idU']))
    {
                                                  //<!-- Barre de navigation -->
      include '/nav_connected.php';
?>
      <div class="container-fluid">
<br>
<iframe src="https://calendar.google.com/calendar/embed?title=Machine3D&amp;height=800&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=hmurd9f901csd252lbdakgej2o%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Europe%2FParis" style="border-width:0" width="1200" height="600" frameborder="0" scrolling="no"></iframe>



<div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1>Réservation <br/> <small> Merci de compléter les champs selon votre choix.</small></h1>
        </div>
      </div>


<form method="POST" action="">


      <div class="row">
        <div class="col-md-offset-2 col-md-1">
          <div class="form-group">
            <label for="heure">heures</label>
            <select class="form-control" name="heure">
              <option value="08" selected>08</option> 
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>
      
        <div class="col-md-offset-2 col-md-1">
          <div class="form-group">
            <label for="minutes">minutes</label>
              <select class="form-control" name="minutes">
                <option value="00" selected>00</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="45">45</option>
              </select>
          </div>
        </div>

        <div class="col-md-offset-2 col-md-1">
          <div class="form-group">
            <label for="durée">durée</label>
              <select class="form-control" name="durée">
                <option value="1" selected>1heure</option>
                <option value="2">2heures</option>
                <option value="3">3heures</option>
                <option value="4">4heures</option>
              </select>
          </div>
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
</div></div>


<?php
}

  else
    {
      include '/nav_non_connected.php';
    }
    ?>
</body>
</html>
                                                    <!-- Inclusion js -->
                                                    <!-- le premier est sûrement inutile -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 -->    <script src="bootstrap/js/bootstrap.min.js"></script>
                                                    <!-- fin inclusion js -->