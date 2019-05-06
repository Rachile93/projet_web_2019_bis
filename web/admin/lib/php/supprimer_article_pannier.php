<?php

$quantite = 0;
$art = new Article_dao($cnx);
$data = $art->select_article_sur_id($_GET['id_article']);
if (count($data) == 1) {
    $quantite = $_GET['quantite'] + $data[0]['quantite'];
}
$art->update_article($quantite, $_GET['id_article']);
$pannier = new Pannier_dao($cnx);
$pannier->suppression_article($_GET['id_article']);
