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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <title>Votre profil</title>
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
                                                  //<!-- Barre de navigation --> (SELECT Projet_idP from realiser WHERE User_idU = ? ) ORDER BY idP");
      include '/nav_connected.php';

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
    $projetinfo = $bdd->prepare("SELECT * FROM projet WHERE realiser_user_idU = ?");
    $projetinfo->execute(array($_SESSION['idU']));
    // $p = $projetinfo->fetch();

    $projetinfo2 = $bdd->prepare("SELECT * FROM projet WHERE realiser_user_idU = ?");
    $projetinfo2->execute(array($_SESSION['idU']));
    $p = $projetinfo2->fetch();

    $requserinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
    $requserinfo->execute(array($_SESSION['idU']));
    $resuserinfo = $requserinfo->fetch();

    $userinfo = $bdd->prepare("SELECT * FROM user WHERE idU = ?");
    $userinfo->execute(array($p['realiser_user_idU']));
    $u2 = $userinfo->fetch();
  ?>
        <div class="container-fluid">
        <div class="well">
          <h2>Votre profil</h2>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Mes informations personnelles</a></li>
            <li><a data-toggle="tab" href="#menu1">Mes projets</a></li>
            <li><a data-toggle="tab" href="#menu2">Mes compétences</a></li>
            <li><a data-toggle="tab" href="#menu3">Mes machines</a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                    <br>
                      <label for="newpseudo">Pseudo</label>
                      <input type="text" class="form-control" id="newpseudo" placeholder="Votre pseudo" name="pseudo" value="<?= $_SESSION['pseudo']; ?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="prenom">Prénom</label>
                      <input type="text" class="form-control" id="prenom" placeholder="Votre prénom" name="prenom" value="<?= $_SESSION['prenom']?>" disabled>
                    </div>
                  </div>

                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom" value="<?= $_SESSION['nom']; ?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="etablissement">Etablissement</label>
                      <input type="text" class="form-control" id="etablissement" placeholder="Votre établissement" name="etablissement" value="<?= $_SESSION['ecole']?>" disabled>
                    </div>
                  </div>

                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="statut">Statut</label>
                      <input type="text" class="form-control" id="statut" placeholder="Votre statut" name="statut" value="<?= $_SESSION['statut']; ?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="newmail">Email</label>
                      <input type="email" class="form-control" id="newmail" placeholder="Votre Email" name="newmail" value="<?= $resuserinfo['mail']; ?>" disabled>
                    </div>
                  </div>

                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="newmail2">Vérification Email</label>
                      <input type="text" class="form-control" id="newmail2" placeholder="Confirmation Email" name="newmail2" value="<?= $resuserinfo['mail']; ?>" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="newmdp">Mot de passe</label>
                      <input type="password" class="form-control" id="newmdp" name="newmdp" placeholder="Mot de passe" disabled>
                    </div>
                  </div>
                  
                  <div class="col-md-offset-2 col-md-3">
                    <div class="form-group">
                      <label for="newmdp2">Vérification mot de passe</label>
                      <input type="password" class="form-control" id="newmdp2" name="newmdp2" placeholder="Vérification mot de passe" disabled>
                    </div>
                  </div>
                </div>


                <a href="editprofil.php">Editer mon profil</a>

    <br>
            </div>
            <div id="menu1" class="tab-pane fade"> 
                <div class="row">
                    <div class="panel panel-lorrain-2">
                    <div class="panel-heading" align="left">
                      <h3>Liste de mes projets :</h3>
                    </div>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Nom du projet</th>
                                <th>Responsable</th>
                                <th>Collaborateurs</th>
                                <th>Date de début</th>
                                <th>Description</th>
                                <th>Modifier</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
        while($info2 = $projetinfo->fetch())
        {
?>
                              <tr>
                                <td><a href="projet.php?id=<?= $info2['idP']?>"> <?= $info2['nomP'];?> </a></td>
                                <td><?= $u2['pseudo'];?></td>
                                <td>zzz</td>
                                <td><?= $info2['dateD'];?></td>
                                <td><?= $info2['descriptionP'];?></td>
                              </tr>
<?php
        }
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>



            <div id="menu2" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
              <h3>Menu 3</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
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
          <h1> Vous êtes déconnecté <br/> <small> Merci de vous <a href="connexion.php">connecter</a> avant de pouvoir accéder à votre profil </small></h1>
        </div>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>