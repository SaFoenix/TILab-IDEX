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
    <link href="font_awesome/css/font_awesome.min.css" rel="stylesheet" >

  </head>
<body class="mybackground">
<?php
    if(isset($_SESSION['idU']))
    {
                                                  //<!-- Barre de navigation -->
      include '/nav_connected.php';

      $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
      $destinataire = $bdd->prepare("SELECT * FROM user WHERE pseudo != ? ORDER BY pseudo");
      $destinataire->execute(array($_SESSION['pseudo']));
      // if(isset($_POST['formdestinataire'])) {
      //   $pseudo_destinataire = htmlspecialchars($_POST['destinataire']);
      //   header("location: chat.php?idchat=".$pseudo_destinataire);
  // }
  ?>
<div class="container-fluid">
  <div>
<!--     <form method="POST" action="">
 -->      <div class="row">
        <div class="col-md-offset-0 col-md-0">
<!--           <select name="destinataire">
 -->            
          <div class="row">
            <div class="panel panel-lorrain-2">
<!--              <div class="panel-heading" align="left">
              Membres
            </div> -->
            <p>Membres avec qui vous pouvez discuter :</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Pseudo</th>
                    <th>Etablissement</th>
                    <th>Statut</th>
                    <th>Compétences</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  while($d = $destinataire->fetch()) { ?>
<!--             <h2>Striped Rows</h2>
-->              
                  <tr>
                    <td><a href="chat.php?pseudo=<?= $d['pseudo']?>&id=<?= $d['idU']?>" target="_blank"><?= $d['pseudo'];?></a></td>
                    <td><?= $d['ecoleU'];?></td>
                    <td><?= $d['statut'];?></td>
                    <td><?= $d['statut'];?></td>

                  </tr>
<!-- <option>
                  <?= $d['pseudo'] ?> taggle
</option> -->
            <?php } ?>

                </tbody>
              </table>
              </div>
          </div>
<!--           </select>
 -->        </div>  
      </div>
      <!-- <div class="row">
        <div class="col-md-offset-4 col-md-4">
          <input class="btn btn-success btn-block" type="submit" name="formdestinataire" value="Discuter !" />
        </div>
      </div> -->
<!--     </form>
 -->  </div>
</div>

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
                                                    <!-- Inclusion js -->
                                                    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
                                                    <!-- fin inclusion js -->