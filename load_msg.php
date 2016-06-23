  <?php 
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
        // $id_destinataire = $bdd->query('SELECT idU FROM user WHERE pseudo = $pseudo_destinataire');    ne fonctionne apparement pas !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $msg = $bdd->prepare("SELECT * FROM discuter WHERE (((User_idU= ? ) OR (User_idU1= ? )) AND ((User_idU= ? ) OR (User_idU1= ? ))) ORDER BY idD DESC");
        $msg->execute(array($_SESSION['idU'], $_SESSION['idU'], $_SESSION['id2'], $_SESSION['id2']));
        while($msg2 = $msg->fetch())
        {
          ?>
<br>    
        <?php
        if($_SESSION['idU'] !== $msg2['User_idU']) {
        ?>
          <li class="left clearfix"><span class="chat-img pull-left">
            <img src="http://placehold.it/50/55C1E7/fff&amp;text=<?= $_GET['pseudo']?>" alt="User Avatar" class="img-circle">
            </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <!-- <strong class="primary-font">Message de : <?php echo $msg2['User_idU']; ?></strong> --> <small class="pull-right text-muted">
                        <?= $msg2['dateHeure'] ?> <span class="glyphicon glyphicon-time" id="nolocale"></span> </small>
                    </div>
                    <p>
                      <?php
                        echo $msg2['msg'];
                      ?>
                    </p>
                </div>
            </li>
      <?php
        }
        else {
        ?>
          <li class="right clearfix"><span class="chat-img pull-right">
            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
            </span>
            <div class="chat-body clearfix">
                <div class="header">
                                                    <!-- <strong class="primary-font">Message de : <?php echo $msg2['User_idU']; ?> --> </strong>
                    <small class=" text-muted pull-left"><span class="glyphicon glyphicon-time" id="nolocale"> <?= $msg2['dateHeure'] ?></span></small>
                </div>
                <p>
                    <?php
                      echo $msg2['msg'];
                    ?>
                </p>
            </div>
        </li>
    <?php
            }
            }
          ?>