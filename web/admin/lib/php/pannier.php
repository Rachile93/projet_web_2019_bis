<?php
try {
    $pannier_dao = new Pannier_dao($cnx);
    $data = $pannier_dao->liste_article_pannier();
    $art_dao = new Article_dao($cnx);
    ?>
    <div class="container-fluid row align-items-start ">
        <table class = "table  table-bordered" class="colonne_tableau">
            <thead>
                <tr>
                    <th class="colonne_tableau ">ID ARTICLE</th>
                    <th class="colonne_tableau ">NOM ARTICLE</th>
                    <th class="colonne_tableau ">PRIX</th>
                    <th class="colonne_tableau ">QUANTITE</th>
                    <th class="colonne_tableau ">PRIX TOTAL</th>
                    <th class="colonne_tableau text-center">Supprimer</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $mesCommandes = fopen("mes_commandes.txt", "w") or die("Unable to open file!");

                for ($i = 0; $i < count($data); $i++) {
                    if (!empty($_SESSION['id_user']) && count($data) != 0) {
                        $article = $art_dao->selection_article($data[$i]['id_article'], $_SESSION['id_user']);

                        if (count($article) != 0) {
                            $total = $article[0]['prix'] * $data[$i]['quantite'];

                            $commandes = $data[$i]['id_article'] . ";" . $article[0]['nom_article'] . ";" . $article[0]['prix'] . ";" . $data[$i]['quantite'] . ";" . $total . "\n";

                            fwrite($mesCommandes, $commandes);
                            ?>
                            <tr>
                                <td class="colonne_tableau "><?php echo $data[$i]['id_article'] ?></td>
                                <td class="colonne_tableau "><?php echo $article[0]['nom_article'] ?></td>
                                <td class="colonne_tableau "><?php echo $article[0]['prix'] . " &euro;" ?></td>
                                <td class="colonne_tableau "><?php echo $data[$i]['quantite'] ?></td> 
                                <td class="colonne_tableau "><?php echo $article[0]['prix'] * $data[$i]['quantite'] . ' &euro;' ?></td>
                                <td class="colonne_tableau  text-center"><a href="index.php?page=supprimer_article_pannier&id_article=<?php echo $data[$i]['id_article'] ?>&quantite=<?php echo $data[$i]['quantite'] ?>"><span class="glyphicon glyphicon-trash"></a></td>                   
                            </tr>
                            <?php
                        }
                    }
                }
                fclose($mesCommandes);
                ?>
            </tbody>
        </table>
        <a href="index.php?page=mes_commandes_pdf" class="btn btn-info" role="button">Generer PDF</a>
    </div>
    <?php
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
