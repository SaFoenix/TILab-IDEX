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
    <title>Bienvenue sur le forum des Fablabs de Toulouse</title>
                                                <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  </head>
  <body class="mybackground">
                                                <!-- Barre de navigation -->
    <?php if (isset($_SESSION['idU']))
              {
            include '/nav_connected.php';
              }
            else
              {
            include '/nav_non_connected.php';
              }
      ?>
                                                <!-- Début du contenu de la page -->
      <div class="container">
        <div>
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
              <h1> Bienvenue  <br/> <small> sur le forum du site des fablabs de Toulouse </small></h1>
            </div>
          </div>
        </div>

      <hr class="featurette-divider">

      <div class="container">
        <div>
          <div class="row">
            <div class="col-md-offset-0 pull-left">
              <h3>Général</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 pull-left">
              Questions générales
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 pull-left">
              Ecoles
            </div>
          </div>
        </div>
      </div>

      <hr class="featurette-divider">


        <div>
          <div class="row">
            <div class="col-md-offset-0 pull-left">
              <h3>Machines</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 pull-left">
              Imprimante 3D
            </div>
            <div class="col-md-offset-1 pull-left">
              Scanner 3D
            </div>
            <div class="col-md-offset-1 pull-left">
              Découpe laser
            </div>
          </div>
        </div>

      <hr class="featurette-divider">

        <div>
          <div class="row">
            <div class="col-md-offset-0 pull-left">
              <h3>Matériaux</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 pull-left">
              Résine
            </div>
          </div>
        </div>

      <hr class="featurette-divider">

        <div class="well">
          <div class="row">
            <div class="col-md-offset-0 pull-left">
              <h3>Catégorie 4</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 pull-left">
              Sous-catégorie 1
            </div>
          </div>
        </div>

      <hr class="featurette-divider">

          <div class="row">
            <div class="panel panel-lorrain-1">
            <div class="panel-heading" align="left">
              Machines
            </div>
<!--             <h2>Striped Rows</h2>
 -->              <p>Machines présentes sur nos fablabs :</p>            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Imprimante 3D</th>
                    <th>Scanner 3D</th>
                    <th>Découpe laser</th>
                    <th>Sous-catégorie 4</th>
                    <th>Sous-catégorie 5</th>
                    <th>Sous-catégorie 6</th>
                  </tr>
                </thead>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Etablissement</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Imrimante 3D</td>
                    <td>Grosse Bertha</td>
                    <td>Campuslab</td>
                  </tr>
                  <tr>
                    <td>Imrimante 3D</td>
                    <td>Moe</td>
                    <td>Campuslab</td>
                  </tr>
                </tbody>
              </table>
                <!-- <tbody>
                  <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                  </tr>
                  <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                  </tr>
                  <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                  </tr>
                </tbody> -->
              </table>
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