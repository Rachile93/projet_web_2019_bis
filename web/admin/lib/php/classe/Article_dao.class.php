<?php

class Article_dao {

    private $cnx;

    public function __construct($cnx) {
        $this->cnx = $cnx;
    }

    public function ajout_article(Article_metier $article) {

        $stmt = $this->cnx->prepare("INSERT INTO article(nom_article,prix,quantite,couleur,description,dat,type_article,genre,taille)
  VALUES (:nom_article,:prix,:quantite,:couleur,:description,:dat,:type_article,:genre,:taille)");
        $nom = $article->getNom();
        $prix = $article->getPrix();
        $quantite = $article->getQuantite();
        $couleur = $article->getCouleur();
        $description = $article->getDescription();
        $date = $article->getDate();
        $type = $article->getType();
        $genre = $article->getGenre();
        $taille = $article->getTaille();


        $stmt->bindParam(':nom_article', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
        $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        $stmt->bindParam(':couleur', $couleur, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':dat', $date, PDO::PARAM_STR);
        $stmt->bindParam(':type_article', $type, PDO::PARAM_STR);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindParam(':taille', $taille, PDO::PARAM_STR);

        /* $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); */

        $res = $stmt->execute();
        if ($res) {
            echo "Les données ont bien été insérées.<br />";
        } else {
            echo "L'insertion des données a échoué.<br />";
        }
    }

    public function liste_vetement($genre) {
        $query = "select * from article where genre= :genre";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':genre', $genre, PDO::PARAM_STR);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function selection_article($id_article, $id_user) {
        $query = "select * from article,pannier,composer";
        $query .= " where pannier.id_pannier=composer.id_pannier and composer.id_article=article.id_article ";
        $query .= " and article.id_article= :id_article and pannier.id_user= :id_user";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $resultset->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function liste_article() {
        $query = "select * from article";
        $resultset = $this->cnx->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();
        return $data;
    }

    public function select_article_sur_id($id_article) {
        $query = "select * from article  where id_article=:id_article";
        $resultset0 = $this->cnx->prepare($query);
        $resultset0->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $resultset0->execute();
        $data = $resultset0->fetchAll();
        return $data;
    }

    public function delete_article($id_art) {
        //selection des images a supprimer dans la table images 
        $query0 = "select * from images  where id_article=:id_article";
        $resultset0 = $this->cnx->prepare($query0);
        $resultset0->bindParam(':id_article', $id_art, PDO::PARAM_INT);
        $resultset0->execute();
        $data = $resultset0->fetchAll();

        $query = "delete from images where id_article=:id_article";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id_article', $id_art, PDO::PARAM_INT);
        $res = $resultset->execute();
        if ($res) {
            $query4 = "delete from composer where id_article=:id_article";
            $resultset4 = $this->cnx->prepare($query4);
            $resultset4->bindParam(':id_article', $id_art, PDO::PARAM_INT);
            $res4 = $resultset4->execute();

            $query2 = "delete from article where id_article=:id_article";
            $resultset2 = $this->cnx->prepare($query2);
            $resultset2->bindParam(':id_article', $id_art, PDO::PARAM_INT);
            $res2 = $resultset2->execute();
            if ($res2) {
                for ($x = 0; $x < count($data); $x++) {
                    $nom_image = $data[$x]['nom_image'];
                    $nom = explode("/", $nom_image);
                    $nom_image = $nom[count($nom) - 1];
                    unlink($nom_image);
                }
                echo "suppression effectuer.<br />";            
                header('Location: http://localhost:8080/projet_web_2019/web/admin/lib/admin.php?page=liste_articles');
            } else {
                echo "echec de suppression.<br />";
            }
        } else {
            echo "echec de suppression.<br />";
        }
    }

    public function update_article($quantite, $id_article) {
        $query = "UPDATE article SET quantite=:quantite WHERE id_article=:id_article";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        $resultset->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        $res = $resultset->execute();
        return $res;
    }

}
