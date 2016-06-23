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
    <title>Machines de nos Fablabs</title>
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

      if (empty($_GET['nom'])){

      $machina = $bdd->prepare("SELECT * FROM machine ORDER BY typeM");
      $machina->execute(array());
  ?>
<div class="container-fluid">
  <div>
        <div class="row">
        <div class="col-md-offset-0 col-md-0">
      
          <div class="row">
            <div class="panel panel-lorrain-2">
              <div class="panel-heading" align="left">
              Machines
            </div>
            <p><br>Liste des machines présentes sur nos différents Fablabs :</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Nom</th>
                    <th>Etablissement</th>
                    <th>Statut</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  while($m = $machina->fetch()) { ?>
                  <tr>
                    <td><?= $m['typeM'];?></td>
                    <td><a href="machine.php?nom=<?= $m['nomM']?>" target="_blank"><?= $m['nomM'];?></a></td>
                    <td><?= $m['ecoleM'];?></td>
                    <td><?= $m['etat'];?></td>
                  </tr>
            <?php } ?>
                </tbody>
              </table>
              </div>
          </div>
        </div>  
      </div>
  </div>
</div>

<?php
  }
      else{
      $machinainfo = $bdd->prepare("SELECT * FROM machine WHERE nomM = ? ");
      $machinainfo->execute(array($_GET['nom']));
      $mi = $machinainfo->fetch();
?>
  <div class="container-fluid">
  <br>
      <div class="row">
          <img alt="image machine" class="col-md-2" src="<?= $mi['photoM']?>" />
          <h1><?= $mi['nomM'] ?>, <?= $mi['typeM'] ?></h1> <br>
        <div class="row" align="center">
          <h4>Descriptif de la machine : </h4><?= $mi['descriptionM'] ?>
        <br><br><br><br>
          <h4>Date de mise en place de la machine : </h4><?= $mi['dateM'];?>
        <br><br><br><br>
          <h4>Etat de la machine : </h4><?= $mi['etat'];?>
        <br><br><br><br>
          <h4>Lien vers le carnet de réservation : </h4><a href="">zzz</a>
        </div>
    </div>
<?php
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
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> avant d'accéder à la page des machines </small></h1>
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