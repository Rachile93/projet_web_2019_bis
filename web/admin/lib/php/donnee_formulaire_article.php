
<?php

//permet de recuperer les données saisie dans le formulaire de creation de compte 
//et de les envoyés en parametre via la methode AJOUT_ARTICLE de la classe ARTICLE_DAO
try {
    $nom = "";
    $prix = 0;
    $quantite = 0;
    $couleur = "";
    $description = "";
    $date = "";
    $type = "";
    $genre = "";
    $taille = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['enregistrer'])) {
            if (!empty($_POST['nom'])) {
                $nom = htmlspecialchars($_POST['nom']);
            }
            if (!empty($_POST['prix'])) {
                $prix = htmlspecialchars($_POST['prix']);
            }
            if (!empty($_POST['quantite'])) {
                $quantite = htmlspecialchars($_POST['quantite']);
            }
            if (!empty($_POST['couleur'])) {
                $couleur = htmlspecialchars($_POST['couleur']);
            }
            if (!empty($_POST['description'])) {
                $description = htmlspecialchars($_POST['description']);
            }
            if (!empty($_POST['date'])) {
                $date = htmlspecialchars($_POST['date']);
            }

            if (!empty($_POST['type'])) {
                $type = htmlspecialchars($_POST['type']);
            }
            if (!empty($_POST['genre'])) {
                $genre = htmlspecialchars($_POST['genre']);
            }
            if (!empty($_POST['taille'])) {
                $taille = htmlspecialchars($_POST['taille']);
            }
            $article = new Article_metier($nom, $prix, $quantite, $couleur, $description, $date, $type, $genre, $taille);
            $art_dao = new Article_dao($cnx);
            $art_dao->ajout_article($article);

            if (file_exists('./lib/php/donnee_images.php')) {
                include ('./lib/php/donnee_images.php');
            }
        }
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}