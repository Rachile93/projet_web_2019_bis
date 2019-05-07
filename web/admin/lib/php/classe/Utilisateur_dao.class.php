<?php

class Utilisateur_dao {

    private $cnx;

    public function __construct($cnx) {
        $this->cnx = $cnx;
    }

    public function create_user(Utilesateur_metier $user) {

        $stmt = $this->cnx->prepare("INSERT INTO utilisateur(nom,prenom,email,date_de_naissance,password,civilite)
  VALUES (:nom,:prenom,:email,:date_naissance,:password,:civilite)");
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $email = $user->getEmail();
        $date_naissance = $user->getDate_naissance();
        $pwd = $user->getPwd();
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);
        $civilite = $user->getCivilite();


        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pwd, PDO::PARAM_STR);
        $stmt->bindParam(':civilite', $civilite, PDO::PARAM_STR);

        /* $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); */

        $res = $stmt->execute();
        if ($res) {
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['id_user'] = $this->cnx->lastInsertId("id_user_seq");
            ?>
            <script>
                var element = document.getElementById("info-session-user");
                element.innerHTML = " <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> ";
                var deconnection = document.getElementById("deconnection");
                var a = document.createElement("a");
                var node = document.createTextNode("deconnection");
                a.appendChild(node);
                a.href = "index.php?page=deconnection";
                deconnection.appendChild(a);
                var admin = document.getElementById("admin");
                admin.innerHTML = "";
                var div_entete = document.getElementById("entete");
                div_entete.removeChild(document.getElementById("creer_compte"));
            </script><?php
            header('location: http://localhost:8080/projet_web_2019/web/index.php?page=accueil');
            echo "Les données ont bien été insérées.<br />";
        } else {
            echo "L'insertion des données a échoué.<br />";
        }
    }

    public function authentification_user($email, $pwd, $rester_connecter) {

        $query = "select * from utilisateur where email = :email";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':email', $email, PDO::PARAM_STR);
        $resultset->execute();
        $data = $resultset->fetchAll();
        if (count($data) == 1) {
            if (password_verify($pwd, $data[0]['password'])) {
                $_SESSION['nom'] = $data[0]['nom'];
                $_SESSION['prenom'] = $data[0]['prenom'];
                $_SESSION['id_user'] = $data[0]['id_user'];
                if (!empty($rester_connecter)) {
                    setcookie("auth", $_SESSION['id_user'] . "----" . sha1($email . $_SESSION['nom']), time() + (3600 * 24 * 3), "/");
                }
                ?>
                <script>
                    var element = document.getElementById("info-session-user");
                    element.innerHTML = " <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> ";
                    var deconnection = document.getElementById("deconnection");
                    var a = document.createElement("a");
                    var node = document.createTextNode("deconnection");
                    a.appendChild(node);
                    a.href = "index.php?page=deconnection";
                    deconnection.appendChild(a);
                    var admin = document.getElementById("admin");
                    admin.innerHTML = "";
                    var div_entete = document.getElementById("entete");
                    div_entete.removeChild(document.getElementById("creer_compte"));
                </script>
                <?php
                header('location: http://localhost:8080/projet_web_2019/web/index.php?page=accueil');
                // echo "vous etes identifier" . $_SESSION['nom'] . " " . $_SESSION['prenom'];
            }
        }
       
    }

    public function liste_utilisteur() {
        $query = "select * from utilisateur";
        $resultset = $this->cnx->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function select_usr($id) {
        $query = "select * from utilisateur where id_user = :id";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id', $id, PDO::PARAM_INT);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function recherche_user($str) {
        $query = "select * from utilisateur where nom like ? ";
        $resultset = $this->cnx->prepare($query);
        $resultset->execute(array('%' . $str . '%'));
        $data = $resultset->fetchAll();
        return $data;
    }

    public function delete_user($id_user) {
        $query = "delete from composer where id_pannier in"
                . " ( select id_pannier from pannier where pannier.id_user=:id_user )";
        $result1 = $this->cnx->prepare($query);
        $result1->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $res1 = $result1->execute();
        if ($res1) {
            $query1 = "delete from pannier where id_user=:id_user";
            $result2 = $this->cnx->prepare($query1);
            $result2->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $res2 = $result2->execute();
            if ($res2) {
                $query2 = "delete from utilisateur where id_user=:id_user";
                $resultset = $this->cnx->prepare($query2);
                $resultset->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $res = $resultset->execute();
                if ($res) {
                    echo "suppression effectuer.<br />";
                } else {
                    echo "echec de suppression.<br />";
                }
            } else {
                $query3 = "delete from utilisateur where id_user=:id_user";
                $resultset = $this->cnx->prepare($query3);
                $resultset->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $res = $resultset->execute();
                if ($res) {
                    echo "suppression effectuer.<br />";
                } else {
                    echo "echec de suppression.<br />";
                }
            }
        } else {
            $query4 = "delete from utilisateur where id_user=:id_user";
            $resultset = $this->cnx->prepare($query4);
            $resultset->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $res = $resultset->execute();
            if ($res) {
                echo "suppression effectuer.<br />";
                echo $id_user;
            } else {
                echo "echec de suppression.<br />";
            }
        }
    }

    public function update_user(Utilesateur_metier $user) {
        
    }

}
