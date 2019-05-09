<?php
//permet de recuperer les données saisie dans le formulaire de creation de compte 
//et de les envoyés en parametre via la methode CREATE_USER de la classe UTILISATEUR_DAO
try {
    $nom = "";
    $prenom = "";
    $email = "";
    $pwd = "";
    $date_naissance = "";
    $civilite = "";
    $pwd_confirm="";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['envoyer'])) {
            if (!empty($_POST['nom'])) {
                $nom = strtolower(htmlspecialchars($_POST['nom']));
            }
            if (!empty($_POST['prenom'])) {
                $prenom = strtolower(htmlspecialchars($_POST['prenom']));
            }
            if (!empty($_POST['date_naissance'])) {
                $date_naissance = htmlspecialchars($_POST['date_naissance']);
            }
            if (!empty($_POST['email'])) {
                $email = strtolower(htmlspecialchars($_POST['email']));
            }
            if (!empty($_POST['pwd'])) {
                $pwd = strtolower(htmlspecialchars($_POST['pwd']));
            }
            if (!empty($_POST['civilite'])) {
                $civilite = strtolower(htmlspecialchars($_POST['civilite']));
            }

            if (!empty($_POST['pwd_confirm'])) {
                $pwd_confirm = strtolower(htmlspecialchars($_POST['pwd_confirm']));
            }

            if (strcmp($pwd,$pwd_confirm) == 0) {
            //  $pwd = password_hash($pwd,PASSWORD_BCRYPT);
                //creation d'une instance de la classe UTILIDATEUR_METIER 
                $user = new Utilesateur_metier($nom, $prenom, $date_naissance, $email, $pwd, $civilite);
              //creation d'une instance UTILISATEUR_DAO
                $user_dao = new Utilisateur_dao($cnx);
                $user_dao->create_user($user);//appelle de la methode create user
            } else {
                echo 'les deux mots de passe ne son pas identique';
            }
        }
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}