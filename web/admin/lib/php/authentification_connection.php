<?php
try {
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['se_connecter'])) {
            if (!empty($_POST['email'])) {
                $email = htmlspecialchars($_POST['email']);
            }
            if (!empty($_POST['pwd'])) {
                $pwd = htmlspecialchars($_POST['pwd']);
            }
             $rester_connecter ="";
            if (!empty($_POST['rester_connecter'])) {
                $rester_connecter = htmlspecialchars($_POST['rester_connecter']);
            }
            $user_dao = new Utilisateur_dao($cnx);
            $user_dao->authentification_user($email,$pwd,$rester_connecter);
            ?>
            <?php
            /* $data = $resultset->fetchAll();

              for ($i = 0; $i < count($d); $i++) {
              print "<br />" . utf8_decode($d[$i]['champ']);
              } */
        }
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
