
<?php
$art = new Article_dao($cnx);
$pannier = new Pannier_dao($cnx);
$img = new Images($cnx);
try {
    ?>
    <div class="row div-container-detail">
        <div class ="div-img-detail" id="div_slide">
            <?php
            //     $_SESSION['id_article'] = $_SESSION['id_article'];

            $data_images = $img->selection_images($_GET['id_article']);
            for ($a = 0; $a < count($data_images); $a++) {
                ?>
                <img class="mySlides" src="<?php echo '.\admin' . $data_images[$a]['nom_image'] ?>"  alt="Lights" style="width:100%">     
                <?php
            }
            ?>
            <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                <?php
                for ($a = 0; $a < count($data_images); $a++) {
                    ?>
                    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo $a ?>)"></span>            
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="detail">
            <?php
            $data = $art->select_article_sur_id($_GET['id_article']);

            ///$id_article = $data[0]['id_aricle'];
            echo '<h3>' . $data[0]['nom_article'] . '</h3><br\>';
            echo '<h3>' . $data[0]['prix'] . ' &euro;</h3>';
            echo '<h3> couleur : </h3><p>' . $data[0]['couleur'] . '</p><br\>';
            $description = explode("--", $data[0]['description']);
            ?> 
            <form action="" method="POST">            
                <div class="form-group">
                    <label for="quantite">Quantite:</label>
                    <input type="number" class="form-control" id="quantite" name="quantite">
                </div>             
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter au pannier</button>
                </div>
                <div class="notification">                
                </div>
            </form>
        </div>      
    </div>
    <?php
    echo '<h3>Descriptif : </h3><br\>';
    for ($x = 0; $x < count($description); $x++) {
        echo '<p>' . $description[$x] . '</p><br\>';
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['ajouter'])) {
            if (!empty($_POST['quantite'])) {
                $quantite = htmlspecialchars($_POST['quantite']);
            }
            if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
                $id_user = $_SESSION['id_user'];


                $data_5 = $art->select_article_sur_id($_GET['id_article']);
                if (count($data_5) == 1 && $data_5[0]['quantite'] >= $quantite) {
                    $res_update = $art->update_article($data_5[0]['quantite'] - $quantite, $_GET['id_article']);
                    if ($res_update == 1) {
                        //  echo 'modification effectuer';
                        ?>
                        <script>
                            notif("<p>modification effectuer</p>")
                        </script>
                        <?php
                    } else {
                        // echo ' echec modification';
                        ?>
                        <script>
                            notif("<p>echec de modification</p>")
                        </script><?php
                    }
                    $data_0 = $pannier->recherche_user($id_user);
                    if (count($data_0) == 0) {
                        $res = $pannier->ajouter_au_pannier($id_user);

                        if ($res) {

                            $data = $pannier->recherche_user($id_user);
                            $res2 = $pannier->ajouter_a_la_table_composer($data[0]['id_pannier'], $_GET['id_article'], $quantite);

                            if ($res2) {
                                // echo "Les données ont bien été insérées.<br />" . $quantite;
                                ?>
                                <script>
                                    notif("<p>Les données ont bien été insérées</p>")
                                </script><?php
                            } else {
                                // echo "L'insertion des données a échoué.<br />" . $quantite;
                                ?>
                                <script>
                                    notif("<p>L'insertion des données a échoué.</p>")
                                </script><?php
                            }
                        } else {
                            //echo "L'insertion des données a échoué.<br />" . $quantite;
                            ?>
                            <script>
                                notif("<p>L'insertion des données a échoué.</p>")
                            </script><?php
                        }
                    } else {
                        $data = $pannier->recherche_user($id_user);
                        $res2 = $pannier->ajouter_a_la_table_composer($data[0]['id_pannier'], $_GET['id_article'], $quantite);
                        if ($res2) {
                            // echo "Les données ont bien été insérées.<br />" . $quantite;
                            ?>
                            <script>
                                notif("<p>Les données ont bien été insérées</p>")
                            </script><?php
                        } else {
                            //   echo "L'insertion des données a échoué.<br />" . $quantite;
                            ?>
                            <script>
                                notif("<p>L'insertion des données a échoué.</p>")
                            </script><?php
                        }
                    }
                } else {
                    //  echo 'quantite saisie non disponible';
                    ?>
                    <script>
                        notif("<p>quantite saisie non disponible.</p>")
                    </script><?php
                }
            } else {
                //     echo 'veiller vous connecter a votre session';
                ?>
                <script>
                    notif("<p>veiller vous connecter a votre session</p>")
                </script><?php
            }
        }
    }
    if (file_exists('./admin/lib/php/slides_images.php')) {
        include ('./admin/lib/php/slides_images.php');
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
