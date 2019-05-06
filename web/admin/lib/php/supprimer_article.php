<?php
$art = new Article_dao($cnx);
$art->delete_article($_GET['id_art']);