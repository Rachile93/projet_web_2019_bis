<?php
//fichier de chargement de autoload
if (file_exists('./admin/lib/php/donnee_connection.php')) {
    include ('./admin/lib/php/donnee_connection.php');
    include ('./admin/lib/php/autoload.php');
} else if (file_exists('./lib/php/donnee_connection.php')) {
    include ('./lib/php/donnee_connection.php');
    include ('./lib/php/autoload.php');
}
