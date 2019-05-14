<script>jqCss(".accueil")</script>
<?php
$liste = new Article_dao($cnx);
$data = $liste->liste_article();
$img = new Images($cnx);
?>
<div class="menu_gauche align-self-start ">

</div>
<div class="contenu row justify-content-start">
    <?php
    try {
        ?>
        <?php
        for ($i = 0; $i < count($data); $i++) {   
            $data_images = $img->selection_images($data[$i]['id_article']);
            ?>
            <div class="thumbnail images_galerie">
                <a href="index.php?page=detail_article&id_article=<?php echo $data[$i]['id_article']; ?>" id="lien_detail_hotel">
                    <img src="<?php echo '.\admin' . $data_images[0]['nom_image'] ?>"  alt="Lights" style="width:350;height:460">
                    <div class="caption">
                        <p  style="text-align: center"><?php echo $data[$i]['nom_article'] . '<br/>' . $data[$i]['prix']." &euro;" ?></p>
                    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                </a>
            </div>
            <?php
        }
        ?>
        <?php
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
    ?>
</div>

