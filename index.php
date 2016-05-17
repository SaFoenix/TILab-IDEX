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
    <link href="font_awesome/css/font_awesome.min.css" rel="stylesheet" >

  </head>
  <body class="mybackground" data-spy="scroll" data-target=".navbar" data-offset="50" id="back_up">
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

      <div class="row featurette">
        <div class="col-md-3 test_img">
          <a href="#section1"><img id="b_and_w" class="featurette-image img-responsive center-block" src="/img/ensiacet.jpg" alt="Photo d'un bâtiment de l'Ensiacet"></a>
        </div>

        <div class="col-md-3 test_img">
          <a href="#section2"><img id="b_and_w" class="featurette-image img-responsive center-block" src="/img/mines_albi_2.jpg" alt="Photo d'un bâtiment des mines d'Albi"></a>
        </div>
        <div class="col-md-3 test_img">
          <a href="#section3"><img id="b_and_w" class="featurette-image img-responsive center-block" src="/img/insa_2.jpg" alt="Photo d'un bâtiment de l'INSA"></a>
        </div>

        <div class="col-md-3 test_img">
          <a href="#section4"><img id="b_and_w" class="featurette-image img-responsive center-block" src="/img/UPS_2.jpg" alt="Photo d'un bâtiment de l'Université Toulouse III Paul Sabatier"></a>
        </div>
      </div>

    <hr class="featurette-divider"> <br>

    <div>

      <div id="section1" class="row featurette">
        <div class="col-md-7"> <!--  flex-center-vertically -->
          <div id="googleMap_1">
          </div>
            <a href="http://www.ensiacet.fr/fr/index.html" target="_blank"><h2 class="featurette-heading">Ensiacet, <span class="text-muted">Labège.</span></h2></a>
            <a href="#back_up">Aller en haut de page</a>
            <br>
        </div>
        <div class="col-md-5">
          <a href="#demo0" data-toggle="collapse"><img  id="test" class="featurette-image img-responsive center-block" src="/img/ensiacet.jpg" alt="Photo d'un bâtiment de l'Ensiacet"></a>
        </div>
          <div id="demo0" class="col-md-12 collapse">
            <p class="lead">Liste des machines disponibles sur le site du fablab de l'Ensiacet</p>
            <div class="panel panel-default"> <!-- http://bootstrap-doc.prauds.fr/index3.php -->
              <div class="panel-heading">
                <h3 class="panel-title">Machines</h3>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item"><span class="badge badge-inverse">2</span>Imprimante 3D</a>
                <a href="#" class="list-group-item"><span class="badge badge-success">1</span>Scanner 3D</a>
                <a href="#" class="list-group-item"><span class="badge badge-info">2</span>Découpe laser</a>
                <a href="#" class="list-group-item"><span class="badge badge-warning">3</span>Fraiseuse</a>
                <a href="#" class="list-group-item"><span class="badge badge-danger">1</span>Machine 5</a>
              </div>
            </div>
          </div>
      </div>
<br>

      <hr class="featurette-divider">

      <div id="section2" class="row featurette">
        <div class="col-md-7 col-md-push-5"> <!--  flex-center-vertically -->
          <div id="googleMap_3">
          </div>
          <div id="demo1">  <!-- class="collapse" -->
            <a href="http://www.mines-albi.fr/" target="_blank"><h2 class="featurette-heading">Ecole des Mines, <span class="text-muted">Albi-Carmaux.</span></h2></a>
            <a href="#back_up">Aller en haut de page</a>
<!--             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid harum saepe, ab pariatur veniam iste ipsam alias, nemo, tempora doloribus nesciunt. Eligendi odit perferendis, ipsum nostrum sapiente voluptas, architecto iusto.</p>
 -->          </div>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <a href="#demo1" data-toggle="collapse"><img class="featurette-image img-responsive center-block" src="/img/mines_albi_2.jpg" alt="Photo d'un bâtiment des mines d'Albi"></a>
        </div>
      </div>
<br>
      <hr class="featurette-divider">

      <div id="section3" class="row featurette">
        <div class="col-md-7">
          <div id="googleMap_4">
          </div>
          <div id="demo2">  <!-- class="collapse" -->
            <a href="http://www.insa-toulouse.fr/fr/index.html" target="_blank"><h2 class="featurette-heading">INSA, <span class="text-muted">Toulouse.</span></h2></a>
            <a href="#back_up">Aller en haut de page <span class="fa-stack fa-1x"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-angle-double-up fa-stack-1x fa-inverse"></i></a>
<!--             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eum, unde aliquam ad aliquid, ea sint at harum aut quae asperiores cupiditate, expedita placeat deleniti praesentium ex tempore accusamus! Vitae.</p>
 -->          </div>
        </div>
        <div class="col-md-5">
          <a href="#demo2" data-toggle="collapse"><img class="featurette-image img-responsive center-block" src="/img/insa_2.jpg" alt="Photo d'un bâtiment de l'INSA"></a>
        </div>
      </div>
<br><br><br><br>
      <hr class="featurette-divider">

      <div id="section4" class="row featurette">
        <div class="col-md-7 col-md-push-5">  <!--  flex-center-vertically -->
          <div id="googleMap_2">
          </div>
          <a href="http://www.univ-tlse3.fr/" target="_blank"><h2 class="featurette-heading">Université Paul Sabatier, <span class="text-muted">Toulouse III.</span></h2></a>
          <a href="#back_up">Aller en haut de page</a>
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

<!-- http://www.w3schools.com/bootstrap/bootstrap_theme_band.asp -->
<script> 
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a,.test_img a,a[href='#back_up'], footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  // // event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 2000, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>

<!-- modifie la hauteur des sections au développement de celles-ci pour y adapter la hauteur lorsqu'on affiche les machines -->
<script type="text/javascript">

var el = document.getElementById("section1");

if (el.style.height = "500px") {
  document.getElementById("test").onclick = function() {up_height()};
}
function up_height() {
    el.style.height = "1000px";
    // el.style.width = "200px";
}
</script>

<!-- <script>

var el = document.getElementById("section1");

if (el.style.height = "1000px") {
  document.getElementById("test").onclick = function() {lower_height()};
}

function lower_height() {
    el.style.height = "500px";
    // el.style.width = "200px";
}
</script> -->
  </body>
</html>