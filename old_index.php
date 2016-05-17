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
    <title>Bienvenue sur le site des Fablabs de Toulouse</title>

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
          <h1>Bienvenue<br/> <small>sur le site des Fablabs de Toulouse Ingénierie</small></h1>
        </div>
      </div>
    </div>

    <hr class="featurette-divider"> <br>

    <div >

      <div class="row featurette">
        <div class="col-md-7"> <!--  flex-center-vertically -->
          <div id="googleMap_1">
          </div>
          <div id="demo0"> <!-- class="collapse" -->
            <a href="http://www.ensiacet.fr/fr/index.html" target="_blank"><h2 class="featurette-heading">Ensiacet, <span class="text-muted">Labège.</span></h2></a>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente totam ratione cum dolore optio. Fugit repellendus, optio perspiciatis dolor consequuntur tenetur voluptatem a vitae, odit aspernatur soluta perferendis esse accusamus!</p> -->
          </div>


        </div>
        <div class="col-md-5">
          <!-- <a href="#demo0" data-toggle="collapse"> --><img class="featurette-image img-responsive center-block" src="/img/ensiacet.jpg" alt="Photo d'un bâtiment de l'Ensiacet"><!-- </a> -->
        </div>
      </div>
<br>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5"> <!--  flex-center-vertically -->
          <div id="googleMap_3">
          </div>
          <div id="demo1">  <!-- class="collapse" -->
            <a href="http://www.mines-albi.fr/" target="_blank"><h2 class="featurette-heading">Ecole des Mines, <span class="text-muted">Albi-Carmaux.</span></h2></a>
<!--             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid harum saepe, ab pariatur veniam iste ipsam alias, nemo, tempora doloribus nesciunt. Eligendi odit perferendis, ipsum nostrum sapiente voluptas, architecto iusto.</p>
 -->          </div>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <a href="#demo1" data-toggle="collapse"><img class="featurette-image img-responsive center-block" src="/img/mines_albi_2.jpg" alt="Photo d'un bâtiment des mines d'Albi"></a>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <div id="googleMap_4">
          </div>
          <div id="demo2">  <!-- class="collapse" -->
            <a href="http://www.insa-toulouse.fr/fr/index.html" target="_blank"><h2 class="featurette-heading">INSA, <span class="text-muted">Toulouse.</span></h2></a>
<!--             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eum, unde aliquam ad aliquid, ea sint at harum aut quae asperiores cupiditate, expedita placeat deleniti praesentium ex tempore accusamus! Vitae.</p>
 -->          </div>
        </div>
        <div class="col-md-5">
          <a href="#demo2" data-toggle="collapse"><img class="featurette-image img-responsive center-block" src="/img/insa_2.jpg" alt="Photo d'un bâtiment de l'INSA"></a>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">  <!--  flex-center-vertically -->
              <div id="googleMap_2"></div>

          <a href="http://www.univ-tlse3.fr/" target="_blank"><h2 class="featurette-heading">Université Paul Sabatier, <span class="text-muted">Toulouse III.</span></h2></a>
<!--           <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid harum saepe, ab pariatur veniam iste ipsam alias, nemo, tempora doloribus nesciunt. Eligendi odit perferendis, ipsum nostrum sapiente voluptas, architecto iusto.</p>
 -->        </div>
        <div class="col-md-5 col-md-pull-7">
          <!-- <a href="http://www.univ-tlse3.fr/" target="_blank"> --><img class="featurette-image img-responsive center-block" src="/img/UPS_2.jpg" alt="Photo d'un bâtiment de l'Université Toulouse III Paul Sabatier"><!-- </a> -->
        </div>
      </div>
      <br>

      <hr class="featurette-divider">
                                                  <!-- Fin du contenu de la page -->
                                                  <!-- Inclusion js -->
                                                  <!-- le premier est sûrement inutile -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
                                                  <!-- fin inclusion js -->
      <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter_1 = new google.maps.LatLng(43.5576387, 1.5026551);
var myCenter_2 = new google.maps.LatLng(43.56263842437514, 1.4687910676002502);
var myCenter_3 = new google.maps.LatLng(43.921959018704925, 2.1779885635071423);
var myCenter_4 = new google.maps.LatLng(43.57032239999999, 1.467920499999991);

function initialize_1() {
var mapProp = {
center:myCenter_1,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap_1"),mapProp);

var marker = new google.maps.Marker({
position:myCenter_1,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize_1);

function initialize_2() {
var mapProp = {
center:myCenter_2,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap_2"),mapProp);

var marker = new google.maps.Marker({
position:myCenter_2,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize_2);

function initialize_3() {
var mapProp = {
center:myCenter_3,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap_3"),mapProp);

var marker = new google.maps.Marker({
position:myCenter_3,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize_3);

function initialize_4() {
var mapProp = {
center:myCenter_4,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap_4"),mapProp);

var marker = new google.maps.Marker({
position:myCenter_4,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize_4);
</script>

  </body>
</html>