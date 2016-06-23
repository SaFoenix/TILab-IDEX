<?php
  session_start();
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');

  $projetinfo2 = $bdd->query("SELECT * FROM projet ORDER BY idP");
  $p = $projetinfo2->fetch();

  $projetinfo = $bdd->query("SELECT * FROM projet ORDER BY idP");
  // $p = $projetinfo->fetch();


  $userinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
  $userinfo->execute(array($p['realiser_user_idU']));
  $u2 = $userinfo->fetch();

  $userinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
  $userinfo->execute(array($p['realiser_user_idU']));
  $u2 = $userinfo->fetch();

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


      if(empty($_GET['id'])){
  ?>
      <div class="container-fluid">
        <div class="panel panel-lorrain-2">
          <div class="panel-heading" align="left">
            <h3>Liste des projets :</h3>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom du projet</th>
                <th>Responsable</th>
                <th>Date de début / Date de fin</th>
                <th>Description</th>
                <th>Lien du projet complet</th>
              </tr>
            </thead>
            <tbody>
<?php
        while($info2 = $projetinfo->fetch())
        {
?>
              <tr>
                <td><a target="_blank" href="projet.php?id=<?= $info2['idP']?>&responsable=<?= $u2['pseudo']?>"> <?= $info2['nomP'];?> </a></td>
                <td><?= $u2['pseudo']; ?></td>
                <td><?= $info2['dateD']; ?></td>
                <td><?= $info2['descriptionP']; ?></td>
                <td><a href="<?= $info2['lienO']?>"> <?= $info2['lienO']; ?> </a></td>
              </tr>
<?php
        }
?>
            </tbody>
          </table>
        </div>
      </div>
<?php
}
    else{
      $projetinfo2 = $bdd->prepare("SELECT * FROM projet WHERE idP = ? ");
      $projetinfo2->execute(array($_GET['id']));
      $p2 = $projetinfo2->fetch();
?>
  <div class="container-fluid">
  <br>
      <div class="row">
          <img src= <?= $p2['photoP']?> class="col-md-2" />
          <h1><?= $p2['nomP'] ?></h1>
        <div class="row" align="center">
          <h4>Description du projet : </h4><?= $p2['descriptionP'] ?>
        <br><br><br><br>
          <h4>Dates de début et de fin du projet: </h4><?= $p2['dateD'];?>
        <br><br><br><br>
          <h4>Responsable du projet : </h4><?= $u2['pseudo'];?>
        <br><br><br><br>
          <h4>Lien vers la page ouiaremakers de ce projet : </h4><?= $p2['lienO'];?>
        </div>
    </div>
<?php
    }

  }
  else
    {
      include '/nav_non_connected.php';

      if(empty($_GET['id'])){
  ?>
      <div class="container-fluid">
        <div class="panel panel-lorrain-2">
          <div class="panel-heading" align="left">
            <h3>Liste des projets :</h3>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom du projet</th>
                <th>Responsable</th>
                <th>Date de début / Date de fin</th>
                <th>Description</th>
                <th>Lien du projet complet</th>
              </tr>
            </thead>
            <tbody>
<?php
        while($info2 = $projetinfo->fetch())
        {
?>
              <tr>
                <td><a target="_blank" href="projet.php?id=<?= $info2['idP']?>&initiateur="> <?= $info2['nomP'];?> </a></td>
                <td><?= $u2['pseudo']; ?></td>
                <td><?= $info2['dateD']; ?></td>
                <td><?= $info2['descriptionP']; ?></td>
                <td><a href="<?= $info2['lienO']?>"> <?= $info2['lienO']; ?> </a></td>
              </tr>
<?php
        }
?>
            </tbody>
          </table>
        </div>
      </div>
<?php
}
    else{
      $projetinfo2 = $bdd->prepare("SELECT * FROM projet WHERE idP = ? ");
      $projetinfo2->execute(array($_GET['id']));
      $p2 = $projetinfo2->fetch();
?>
  <div class="container-fluid">
              <h3><?= $p2['nomP'] ?></h3>
              <div class="row">
                <img src="/img/logo_INSA.jpg" class="col-md-2"/>
              </div>
              <div class="row" align="center">
                  <h4>Description du projet : </h4><?= $p2['descriptionP'] ?>
              </div>
              <br>
              <div class="row" align="center">
        <br>        Dates de début et de fin du projet: <?= $p2['dateD'];?>
              </div>
              <div class="row" align="center">
        <br>        <h4>Responsable du projet : </h4><?= $u2['pseudo'];?>
              </div>
              <div class="row" align="center">
        <br>        Lien vers la page ouiaremakers de ce projet : <?= $p2['lienO'];?>
              </div>
  </div>
<?php
      }
    }
    ?>
</body>
</html>
                                                    <!-- Inclusion js -->
                                                    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
                                                    <!-- fin inclusion js -->