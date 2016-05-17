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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <title>Chat des Fablabs</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">



</head>
<body class="mybackground">



<?php
        
    if(isset($_SESSION['idU']))
    { 
?>

    <!-- Barre de navigation -->

  <div class="navbar navbar-inverse navbar-fixed-top">
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

        <li><a href="profil.php">Mon profil</a></li>
        <li class="active"><a href="chat.php" target="_blank">Chat</a></li>
        <li><a href="deconnexion.php">Se déconnecter</a></li>
      </ul>
    </div>
  </div>


<!-- Insertion message dans le BDD -->

    <?php

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');

    if(isset($_POST['message']) AND !empty($_POST['message']))
    {
      $pseudo = htmlspecialchars($_SESSION['pseudo']);
      $message = htmlspecialchars($_POST['message']);
      $pseudo2 = htmlspecialchars($_POST['pseudo2']);
      // $heure = 12;
      $insertmsg = $bdd->prepare("INSERT INTO discuter(User_idU, User_idU1, msg, dateHeure) VALUES(?, ?, ?, NOW())");
      $insertmsg->execute(array($pseudo, $pseudo2, $message));
    }
    ?>

<!-- FIN insertion -->




<!-- Début du contenu de la page -->

<div class="container">
   <div   >
  <!--    <form method="post" action="">
        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <div class="form-group">
              <textarea type="text" class="form-control" name="message" placeholder="Votre message <?php echo $_SESSION['pseudo']?>"></textarea><br>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-md-offset-4 col-md-4">
              <input class="btn btn-success btn-block" type="submit" value="Envoyer" />
            </div>  
          </div>
        </form>
      </div> -->
    <div class="row">
        <div class="col-md-offset-0 col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment" id="locale"></span>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="#"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
<div id="message">
  <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');

        $msg = $bdd->query("SELECT * FROM discuter ORDER BY dateHeure DESC");
        while($msg2 = $msg->fetch())
        {
          ?>
<br>    
        <?php
        if($_SESSION['pseudo'] !== $msg2['pseudo']) {
        ?>

          <li class="left clearfix"><span class="chat-img pull-left">
            <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
            </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font"><?php echo $msg2['pseudo']; ?></strong> <small class="pull-right text-muted">
                        <span class="glyphicon glyphicon-time" id="nolocale"></span> </small>
                    </div>
                    <p>
                      <?php
                        echo $msg2['message'];
                      ?>
                    </p>
                </div>
            </li>

      <?php
        }

        else {
        ?>
          <li class="right clearfix"><span class="chat-img pull-right">
            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
            </span>
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font"><?php echo $msg2['pseudo']; ?></strong>
                    <small class=" text-muted pull-left"><span class="glyphicon glyphicon-time" id="nolocale"></span></small>
                </div>
                <p>
                    <?php
                        echo $msg2['message'];
                    ?>
                </p>
            </div>
        </li>

<?php
        }

        }
      ?>
</div>

            </ul>
              </div>
                <form method="post" action="">
                  <div class="panel-footer">
                    <textarea type="text" class="form-control" name="message" placeholder="Votre message <?php echo $_SESSION['pseudo']?>"></textarea>
                    <span class="input-group-btn">
                    <input class="btn btn-success btn-block" type="submit" value="Envoyer" />
                    </span>
                  <div class="form-group">
                    <label for="pseudo2">Envoyer un message à :</label>
                    <input type="text" class="form-control" id="pseudo2" placeholder="Votre destinataire" name="pseudo2" value="<?php if(isset($pseudo2)) { echo $pseudo2; } ?>">
                  </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>










<!-- Fin du contenu de la page -->





<!-- Inclusion js -->
    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>

<!-- fin inclusion js -->


<script>
  setInterval('load_msg()', 1000);
  function load_msg()
  {
    $('#message').load('load_msg.php');
  }
</script>


<script type="text/javascript">
                    function afficher() {
                      var offsetUTC = +12,
                      lD = new Date(),
                      oD = new Date();
                      oD.setHours(lD.getUTCHours()+offsetUTC);

                      document.getElementById('locale').innerHTML = ""+lD.toLocaleString();
                    }

                    window.onload=function() {
                      afficher();
                      setInterval(afficher,1000);
                    }
</script>





<!-- entre php
                        date_default_timezone_set('Europe/Paris'); // pour forcer l'affichage heure française
                        $dateheure = date("d-m-Y H:i"); 

                        echo $dateheure;
                       -->




</body>
</html>


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
        <li class="active"><a href="chat.php" target="_blank">Chat</a></li>
      </ul>
      </div></div>

  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> avant d'utiliser le chat </small></h1>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
<?php
      
    }
    ?>