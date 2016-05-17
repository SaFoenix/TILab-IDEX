 <?php
 session_start();
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=ti_labs', 'root', '');
        $id_connect = $_SESSION['idU'];
        $msg = $bdd->query("SELECT * FROM discuter WHERE (((User_idU='$id_connect') OR (User_idU1='$id_connect')) AND ((User_idU='$id_connect') OR (User_idU1='$id_connect'))) ORDER BY dateHeure DESC");
        setlocale(LC_TIME, 'fr');
        // $date = $bdd->query('SELECT dateHeure from');
        // $req_pseudo = $bdd->prepare('SELECT pseudo FROM user WHERE idU = ?');
        // $req_pseudo->execute(array($msg['User_idU']));
        while($msg2 = $msg->fetch())
        {
          ?>
<br>    
        <?php
        if($_SESSION['idU'] !== $msg2['User_idU']) {
        ?>
          <li class="left clearfix"><span class="chat-img pull-left">
            <img src="http://placehold.it/50/55C1E7/fff&amp;text=Other" alt="User Avatar" class="img-circle">
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
<!--                     <strong class="primary-font"><?php echo $msg2['pseudo']; ?></strong>
 -->                    <small class=" text-muted pull-left"><span class="glyphicon glyphicon-time" id="nolocale"> <?= $msg2['dateHeure'] ?></span></small>
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