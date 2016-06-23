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
    <title>Bienvenue sur le site des Fablabs de Toulouse Ingénierie</title>

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


<!-- Fin du contenu de la page -->
<!-- Inclusion js -->
<!-- le premier est sûrement inutile -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
<!-- fin inclusion js -->
      <script src="http://maps.googleapis.com/maps/api/js"></script>
      
  </body>
</html>