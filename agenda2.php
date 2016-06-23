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
    <title>Projets des Fablabs</title>
                                                    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="font_awesome/css/font_awesome.min.css" rel="stylesheet">
<!--     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>


  <script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});
  </script>

  </head>
<body class="mybackground">
<?php
    if(isset($_SESSION['idU']))
    {
                                                  //<!-- Barre de navigation -->
      include '/nav_connected.php';
?>
      <div class="container-fluid">
<br>

      <div id='calendar'>coucou</div>

<?php

}

  else
    {
      include '/nav_non_connected.php';
    }
    ?>
</body>
</html>
                                                    <!-- Inclusion js -->
                                                    <!-- le premier est sûrement inutile -->
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 -->    <script src="bootstrap/js/bootstrap.min.js"></script>
                                                    <!-- fin inclusion js -->