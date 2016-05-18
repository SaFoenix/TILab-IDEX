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
          if (!empty($_GET['pseudo'])){
            include '/nav_connected.php';
                                                    //<!-- Insertion message dans le BDD -->
          $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
          if(isset($_SESSION['idU']) AND !empty($_SESSION['idU'])) {
             if(isset($_POST['envoi_message'])) {
                if(isset($_GET['idchat'],$_POST['message']) AND !empty($_GET['idchat']) AND !empty($_POST['message'])) {
                   $destinataire = htmlspecialchars($_GET['idchat']);
                if(isset($_GET['pseudo'],$_POST['message']) AND !empty($_GET['pseudo']) AND !empty($_POST['message'])) {
                   $message = htmlspecialchars($_POST['message']);
                   $id_destinataire = $bdd->prepare('SELECT idU FROM user WHERE pseudo = ?');
                   $id_destinataire->execute(array($destinataire));
                   $dest_exist = $id_destinataire->rowCount();
                   if($dest_exist == 1) {
                      $id_destinataire = $id_destinataire->fetch();
                      $id_destinataire = $id_destinataire['idU'];
                      $ins = $bdd->prepare('INSERT INTO discuter(User_idU,User_idU1,msg,dateHeure) VALUES (?,?,?,NOW())');
                      $ins->execute(array($_SESSION['idU'],$id_destinataire,$message));
                      $error = "Votre message a bien été envoyé !";
                   } else {
                      $error = "Cet utilisateur n'existe pas...";
                   }
                } else {
                   $error = "Veuillez compléter tous les champs";
                }
             }
          $destinataires = $bdd->query('SELECT pseudo FROM user ORDER BY pseudo');
      ?>
                                                      <!-- FIN insertion -->
                                                    <!-- Début du contenu de la page -->
<div class="container-fluid">
   <div>
  <!--    <form method="post" action="">
        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <div class="form-group">
              <textarea type="text" class="form-control" name="message" placeholder="Votre message <?= $_SESSION['pseudo']?>"></textarea><br>
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
<div id="message_test">
  <?php 
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
        // $id_destinataire = $bdd->query('SELECT idU FROM user WHERE pseudo = $pseudo_destinataire');    ne fonctionne apparement pas !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $msg = $bdd->prepare("SELECT * FROM discuter WHERE (((User_idU= ? ) OR (User_idU1= ? )) AND ((User_idU= ? ) OR (User_idU1= ? ))) ORDER BY idD DESC");
        $msg->execute(array($_SESSION['idU'], $_SESSION['idU'], $_GET['id'], $_GET['id']));
        while($msg2 = $msg->fetch())
        {
          ?>
<br>    
        <?php
        if($_SESSION['idU'] !== $msg2['User_idU']) {
        ?>
          <li class="left clearfix"><span class="chat-img pull-left">
            <img src="http://placehold.it/50/55C1E7/fff&amp;text=<?= $_GET['pseudo']?>" alt="User Avatar" class="img-circle">
            </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <!-- <strong class="primary-font">Message de : <?php echo $msg2['User_idU']; ?></strong> --> <small class="pull-right text-muted">
                        <?= $msg2['dateHeure'] ?> <span class="glyphicon glyphicon-time" id="nolocale"></span> </small>
                    </div>
                    <p>
                      <?php
                        echo $msg2['msg'];
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
                                                    <!-- <strong class="primary-font">Message de : <?php echo $msg2['User_idU']; ?> --> </strong>
                    <small class=" text-muted pull-left"><span class="glyphicon glyphicon-time" id="nolocale"> <?= $msg2['dateHeure'] ?></span></small>
                </div>
                <p>
                    <?php
                      echo $msg2['msg'];
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
                    <textarea type="text" class="form-control" name="message" placeholder="Veuillez écrire votre message <?php echo $_SESSION['pseudo']?>"></textarea>
                    <div class="form-group">
  <!--                     <label>Envoyer un message à :</label> <?= $_GET['pseudo']; ?>
                           <select name="destinataire">
                      <?php while($d = $destinataires->fetch()) { ?>
                        <option> <?= $d['pseudo'] ?> </option>
                      <?php } ?>
                    </select> -->
                    </div>
                    <span class="input-group-btn">
                    <input class="btn btn-success btn-block" type="submit" value="Envoyer le message à <?= $_GET['pseudo']; ?>" name="envoi_message" />
                    </span>
                    <br>
                    <?php if(isset($error)) {
                      echo '<span style="color:red">' .$error.'</span>';
                      }
                    ?>
                    <br>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
<script>
  // setInterval('load_msg()', 500);
  function load_msg()
  {
    $('#message_test').load(chat.php + '#message_test');
  }

  $.get('/api/message_test', function(data) {
  $('#message_test').html(data);
});
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
                      // load_msg();
                      // setInterval(load_msg,1000);
                    }
</script> 
<!-- entre php
                        date_default_timezone_set('Europe/Paris'); // pour forcer l'affichage heure française
                        $dateheure = date("d-m-Y H:i"); 
                        echo $dateheure;
                       -->
    <?php
      }
      else {
        include '/nav_connected.php';
    ?>
      Vous devez choisir votre destinataire avant de pouvoir discuter avec. Redirection en cours
      <?php
      header("refresh:5;url=pre_chat.php");
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

</body>
</html>