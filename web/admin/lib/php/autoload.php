<?php

function autoload($nom_classe) {
    if (file_exists('./lib/php/classe/' . $nom_classe . '.class.php')) {
        require './lib/php/classe/' . $nom_classe . '.class.php';
    } else if (file_exists('./admin/lib/php/classe/' . $nom_classe . '.class.php')) {
        require './admin/lib/php/classe/' . $nom_classe . '.class.php';
    }
}

//fct qui appelle méthode d'autochargement des classes
spl_autoload_register('autoload');
