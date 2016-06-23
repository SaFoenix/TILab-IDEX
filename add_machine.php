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
    <title>Ajout d'une machine</title>

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
    <!-- Fin de la barre de navigation -->
    <!-- Début du contenu de la page -->
  <div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h1> Ajoutez une machine<br> <small> Ici vous pouvez ajouter une machine à un Fablab</small></h1>
        </div>
      </div>
<form method="post" action="" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="nomM">Nom de la machine</label>
            <input type="text" class="form-control" id="nomM" placeholder="Nom de votre machine" name="nomM" value="">
          </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
            <label for="typeM">Type de la machine</label>
            <select class="form-control" name="typeM">
              <option value="imp3D" selected>Imprimante 3D</option> 
              <option value="scan3D">Scanner 3D</option>
              <option value="decoupelaser">Découpe laser</option>
              <option value="Autre">Autre</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-4">
          <div class="form-group">
            <label for="photoM">Photo de votre machine</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input type="file" name="photoM" id="photoM" placeholder="Photo de la machine" />
          </div>
        </div>

        <div class="col-md-offset-1 col-md-3">
          <div class="form-group">
            <label for="ecoleM">Établissement</label>
            <select class="form-control" name="ecoleM">
              <option value="Ensiacet" selected>Ensiacet</option> 
              <option value="MinesAlbi">Mines d'Albi</option>
              <option value="INSA">INSA</option>
              <option value="UPS">Université toulouse III Paul Sabatier</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="form-group">
            <label for="descriptionM">Détails de votre machine</label>
            <textarea type="text" class="form-control" name="descriptionM" id="descriptionM" placeholder="Détails de la machine"></textarea>
          </div>
        </div>
      </div>

      <div class="row">

      </div>

      <br>
      <div class="row">
        <div class="col-md-offset-4 col-md-4">
          <input type="submit" class="btn btn-primary btn-block" name="formmachine" value="Envoyer mes informations &rpargt;">
        </div>
      </div>
      <br>
                                                <!-- partie inscription PHP -->
          <?php
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
            if(isset($_POST['formmachine'])) {
              $nomM = htmlspecialchars($_POST['nomM']);
              $typeM = htmlspecialchars($_POST['typeM']);
              $ecoleM = htmlspecialchars($_POST['ecoleM']);
              $descriptionM = htmlspecialchars($_POST['descriptionM']);
              if(!empty($_POST['nomM']) AND !empty($_POST['typeM']) AND !empty($_POST['descriptionM'])) {

                $maxsize = 1048576;
                $maxwidth = 1048576;
                $maxheight = 1048576;

                if ($_FILES['photoM']['error'] > 0) $erreur = "Erreur lors du transfert";

                if ($_FILES['photoM']['size'] > $maxsize) $erreur = "Le fichier est trop gros";


                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(  substr(  strrchr($_FILES['photoM']['name'], '.')  ,1)  );
                if (in_array($extension_upload,$extensions_valides) ) echo "Extension correcte <br>";


                $image_sizes = getimagesize($_FILES['photoM']['tmp_name']);

                if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

                $test = $_SESSION['idU'];
                if(file_exists("fichier/machines/") == FALSE) mkdir("fichier/machines/", 0777, true);
                $nom = md5(uniqid(rand(), true));


                $idmachine = $bdd->prepare('SELECT idM FROM machine WHERE nomM = ?');
                $idmachine->execute(array($nomM));
                $idMa = $idmachine->fetch();

                $nom = "fichier/machines/{$idMa['idM']}.{$extension_upload}";
                $resultat = move_uploaded_file($_FILES['photoM']['tmp_name'],$nom);
                if ($resultat) echo "Transfert réussi";


                $insertmbr = $bdd->prepare("INSERT INTO machine(nomM, dateM, descriptionM, typeM, photoM, ecoleM) VALUES(?, NOW(), ?, ?, ?, ?)");
                $insertmbr->execute(array($nomM, $descriptionM, $typeM, $nom, $ecoleM));
                $resultat0 = "Votre machine a bien été ajoutée !";
               }
               else {
                $resultat2 = "Veuillez compléter tous les champs !";
               }
            }
            ?>
                                                <!-- fin partie insc. php -->
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
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> pour ajouter une machine <br>Redirection dans 5 secondes </small></h1>
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