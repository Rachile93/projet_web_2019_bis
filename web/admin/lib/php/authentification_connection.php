<?php
//ce fichier permet de recuperer les données saisie dans l'espace reserver a la connection
//puis de les envoie en parametre de lors de l'appelle de la methode AUTHENTIFICATION_USER() dans la 
//classe USER-DAO afin de verifier que les données existe dans la table UTILISATEUR de notre base de donne
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
