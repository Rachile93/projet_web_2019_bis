<?php
try {
    $art_dao = new Article_dao($cnx);
    $data = $art_dao->liste_article();
    ?>
    <div class="container-fluid">
        <table class = "table  table-bordered" class="colonne_tableau">
            <thead>
                <tr>
                    <th class="colonne_tableau ">NOM</th>
                    <th class="colonne_tableau ">PRIX</th>
                    <th class="colonne_tableau ">QTE</th>
                    <th class="colonne_tableau text-center">COULEUR</th>
                    <th class="colonne_tableau ">DESCRIPTION</th>
                    <th class="colonne_tableau ">DATE</th>
                    <th class="colonne_tableau text-center">TYPE</th> 
                    <th class="colonne_tableau text-center">GENRE</th> 
                    <th class="colonne_tableau text-center">TAILLE</th> 
                    <th class="colonne_tableau text-center">Supprimer</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($data); $i++) {
                    ?>
                    <tr>
                        <td class="colonne_tableau "><?php echo $data[$i]['nom_article'] ?></td>
                        <td class="colonne_tableau "><?php echo $data[$i]['prix']." &euro;" ?></td>
                        <td class="colonne_tableau "><?php echo $data[$i]['quantite'] ?></td> 
                        <td class="colonne_tableau text-center"><?php echo $data[$i]['couleur'] ?></td>
                        <td class="colonne_tableau "><?php echo $data[$i]['description'] ?></td>
                        <td class="colonne_tableau "><?php echo $data[$i]['dat'] ?></td>
                        <td class="colonne_tableau text-center"><?php echo $data[$i]['type_article'] ?></td>
                        <td class="colonne_tableau text-center"><?php echo $data[$i]['genre'] ?></td>
                        <td class="colonne_tableau text-center"><?php echo $data[$i]['taille'] ?></td>
                        <td class="colonne_tableau  text-center"><a href="index.php?page=supprimer_article&id_art=<?php echo $data[$i]['id_article'] ?>"><span class="glyphicon glyphicon-trash"></a></td>                   
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
