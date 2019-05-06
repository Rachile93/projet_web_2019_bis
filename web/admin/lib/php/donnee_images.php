<?php

if (isset($_FILES['image_uploads'])) {
    # dans cette boucle on manipule les informations de chaque fichiers
    for ($i = 0; $i < count($_FILES['image_uploads']['name']); $i++) {
        $target_dir = ".\images\\";
        $name_file = $_FILES['image_uploads']['name'][$i];
        $target_file = $target_dir . $name_file;
        //$uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (strlen($_FILES['image_uploads']['error'][$i]) != 0) {
            echo 'fichier ' . $i . ' contient une ou plusieurs erreurs';
        }
        if (!move_uploaded_file($_FILES['image_uploads']['tmp_name'][$i], $target_file)) {
            echo '.<br /> un problème est survenu lors de l\'enregistrement du fichier .<br />';
        }

        $query = "select id_article from article where  nom_article = :nom ";
        $resultset = $cnx->prepare($query);
        $resultset->bindParam(':nom', $nom, PDO::PARAM_STR);
        $resultset->execute();
        $data = $resultset->fetchAll();
        $stmt = $cnx->prepare("INSERT INTO images(id_article,nom_image)
                    VALUES (:id_article,:nom_image)");
        $stmt->bindParam(':id_article', $data[0]['id_article'], PDO::PARAM_INT);
        $stmt->bindParam(':nom_image', $target_file, PDO::PARAM_STR);
        $res = $stmt->execute();
    }
}