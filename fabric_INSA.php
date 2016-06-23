<?php
  session_start();
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');

  $machineinfo = $bdd->prepare("SELECT * FROM machine WHERE ecoleM = ? ORDER BY typeM");
  $machineinfo->execute(array('INSA'));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
                                                <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bienvenue sur le site du Fablab de l'INSA</title>
                                                <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="font_awesome/css/font_awesome.min.css" rel="stylesheet">
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
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <h1>Bienvenue<br/> <small>sur fabric'INSA, site du fablab de l'INSA Toulouse</small></h1>
      </div>
    </div>

  <hr class="featurette-divider"> <br>

          <div id="section3" class="row featurette">
        <div class="col-md-7">
          <div id="googleMap_4">
          </div>
          <div id="demo2">  <!-- class="collapse" -->
            <a href="http://www.fabric-insa.fr/" target="_blank"><h2 class="featurette-heading">INSA, <span class="text-muted">Toulouse.</span></h2></a>
            <a href="#back_up">Aller en haut de page <span class="fa-stack fa-1x"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-angle-double-up fa-stack-1x fa-inverse"></i></a>
<!--             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eum, unde aliquam ad aliquid, ea sint at harum aut quae asperiores cupiditate, expedita placeat deleniti praesentium ex tempore accusamus! Vitae.</p>
 -->          </div>
        </div>
        <div class="col-md-5">
          <a href="#demo2" data-toggle="collapse"><img class="featurette-image img-responsive center-block" src="/img/insa_2.jpg" alt="Photo d'un bâtiment de l'INSA"></a>
        </div>
      </div>
<br>
  <hr class="featurette-divider">
<br>
    <div class="row">
      <h1>Description/horaires/responsables/...</h1>
      <br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque autem, aliquid magnam aperiam, recusandae ab quas nihil sunt sequi alias ea, ex ipsum placeat, odio saepe quaerat praesentium libero! Rerum.
      <br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nostrum, beatae obcaecati ea doloremque! Quaerat laboriosam atque eligendi molestias voluptatum voluptas iusto. Reiciendis, in ab alias animi blanditiis dolores quos?
      <br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam nemo, dignissimos modi facilis molestiae nihil fugit sequi, doloribus doloremque quis temporibus, atque cumque consectetur quas sint quasi unde. In, facilis!
    </div>
<br>
  <hr class="featurette-divider">

          <div class="row">
            <div class="panel panel-lorrain-1">
            <div class="panel-heading" align="left">
              Machines
            </div>
              <p>Machines présentes sur nos fablabs :</p>            
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Etat</th>
                  </tr>
                </thead>
                <tbody>
<?php
      while ($m = $machineinfo->fetch()){
?>
                  <tr>
                    <td><?= $m['typeM']?></td>
                    <td><a href="machine.php?nom=<?= $m['nomM']?>" target="_blank"><?= $m['nomM'];?></a></td>
                    <td><?= $m['etat'] ?></td>
                  </tr>
<?php
    }
?>
                </tbody>
              </table>
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
var myCenter_4 = new google.maps.LatLng(43.57032239999999, 1.467920499999991);

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
  </body>
</html>