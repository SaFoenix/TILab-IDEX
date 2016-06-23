<?php
  session_start();
?>
<!DOCTYPE html>
  <?php
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ajout projet</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body class="mybackground">
    <!-- Barre de navigation -->
<?php if (isset($_SESSION['idU']))
  { 
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
    // $requserinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
    // $requserinfo->execute(array($_SESSION['idU']));
    // $resuserinfo = $requserinfo->fetch();
    include '/nav_connected.php';
?>
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Créez votre projet<br> <small> Ici vous pouvez renseigner votre projet</small></h1>
        </div>
      </div>
<form method="post" action="" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="nomP">Nom du projet</label>
            <input type="text" class="form-control" id="nomP" placeholder="Nom de votre projet" name="nomP" value="">
          </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="lienO">Lien ouiaremaker.com</label>
            <input type="text" class="form-control" id="lienO" placeholder="Lien externe" name="lienO" value="">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="form-group">
            <label for="photoP">Photo de votre projet</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input type="file" name="photoP" id="photoP" placeholder="Photo du projet" />
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="form-group">
            <label for="descriptionP">Description de votre projet</label>
            <textarea type="text" class="form-control" name="descriptionP" id="descriptionP" placeholder="Description brève du projet"></textarea>
          </div>
        </div>
      </div>

      <div class="row">

      </div>

      <br>
      <div class="row">
        <div class="col-md-offset-4 col-md-4">
          <input type="submit" class="btn btn-primary btn-block" name="formprojet" value="Envoyer mes informations &rpargt;">
        </div>
      </div>
      <br>
          <?php
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
            if(isset($_POST['formprojet'])) {
              $nomP = htmlspecialchars($_POST['nomP']);
              $lienO = htmlspecialchars($_POST['lienO']);
              $descriptionP = htmlspecialchars($_POST['descriptionP']);
              if(!empty($_POST['nomP']) AND !empty($_POST['lienO']) AND !empty($_POST['descriptionP'])) {

                $maxsize = 1048576;
                $maxwidth = 1048576;
                $maxheight = 1048576;

                if ($_FILES['photoP']['error'] > 0) $erreur = "Erreur lors du transfert";

                if ($_FILES['photoP']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(  substr(  strrchr($_FILES['photoP']['name'], '.')  ,1)  );
                if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte <br>";


                $image_sizes = getimagesize($_FILES['photoP']['tmp_name']);

                if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

                $test = $_SESSION['idU'];
                if(file_exists("fichier/{$_SESSION['idU']}/") == FALSE) mkdir("fichier/{$_SESSION['idU']}/", 0777, true);
                $nom = md5(uniqid(rand(), true));

                $idprojet = $bdd->prepare('SELECT idP FROM projet WHERE nomP = ?');
                $idprojet->execute(array($nomP));
                $idPr = $idprojet->fetch();

                $nom = "fichier/{$_SESSION['idU']}/{$idPr['idP']}.{$extension_upload}";
                $resultat = move_uploaded_file($_FILES['photoP']['tmp_name'],$nom);
                if ($resultat) echo "Transfert réussi";

                $insertmbr = $bdd->prepare("INSERT INTO projet(nomP, dateD, descriptionP, lienO, realiser_user_idU, photoP) VALUES(?, NOW(), ?, ?, ?, ?)");
                $insertmbr->execute(array($nomP, $descriptionP, $lienO, $_SESSION['idU'], $nom));
                $resultat0 = "Votre projet a bien été créé !";
               }
               else {
                $resultat2 = "Veuillez compléter tous les champs !";
               }
            }
            ?>
            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTDEUX" class="hidden">
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> 
                      <?php
                              if(isset($resultat0)) {
                                  echo $resultat0;
                      ?>   
                              <script>    document.getElementById("TESTDEUX").removeAttribute("class","hidden row") </script>
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div id="TESTQUATRE" class="hidden">
                  <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Oops !</strong> 
                      <?php
                              if(isset($resultat2)) {
                                  echo $resultat2;
                      ?>   
                              <script>    document.getElementById("TESTQUATRE").removeAttribute("class","hidden row") </script>
                      <?php
                               }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </form>
    </div>
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
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> pour accéder à votre profil <br>Redirection dans 5 secondes </small></h1>
        </div>
      </div>
      </div>
      </div>
<?php
header("refresh:5;url=connexion.php");
        }
?>
<!-- Inclusion js -->
    <!-- le premier est sûrement inutile -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<!-- fin inclusion js -->
</body>
</html>