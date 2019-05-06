<?php

class Pannier_dao {

    //put your code here
    private $cnx;

    public function __construct($cnx) {
        $this->cnx = $cnx;
    }

    public function liste_article_pannier() {
        $query = "select * from composer";
        $resultset = $this->cnx->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function recherche_user($id_user) {
        $query = "select * from pannier where id_user=:id_user";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function ajouter_au_pannier($id_user) {
        $stmt = $this->cnx->prepare("INSERT INTO pannier(id_user)
  VALUES (:id_user)");

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $res = $stmt->execute();
        return $res;
    }

    public function ajouter_a_la_table_composer($id_pannier, $id_article, $quantite) {
        $stmt2 = $this->cnx->prepare("INSERT INTO composer(id_pannier,id_article,quantite)
  VALUES (:id_pannier,:id_article,:quantite)");

        $stmt2->bindParam(':id_pannier', $id_pannier, PDO::PARAM_INT);
        $stmt2->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        $stmt2->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $res = $stmt2->execute();
        return $res;
    }

    public function suppression_article($id_article) {
        $query = "delete from composer where id_article=:id_article";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $res = $resultset->execute();
        if ($res) {
           
            echo "suppression effectuer.<br />";
            header('Location: http://localhost:8080/projet_web_2019/web/index.php?page=pannier');
        } else {
            echo "echec de suppression.<br />";
        }
    }

}
