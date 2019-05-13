<?php
include ('./admin/lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();

if (file_exists('./admin/lib/php/cookie.php')) {
    include ('./admin/lib/php/cookie.php');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="./admin/lib/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
        <script src="./admin/lib/jquery/monJquery.js"></script>
        <script src="./admin/lib/php/ajax/ajax.js"></script>
        <link href=".\admin\lib\css\styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body><?php
        if (file_exists('./admin/pages/headerPublic.php')) {
            require './admin/pages/headerPublic.php';
        }
        ?>
        <div class="container-fluid row  align-items-center corp">
            <?php
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "accueil";
            }
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            $path = './admin/lib/php/' . $_SESSION['page'] . '.php';
            if (file_exists($path)) {
                include ($path);
            } else {
                ?>
                <span class="txtGras txtRouge">Contenu utile</span>
                <meta http-refresh: Content="1;url=index.php?page=accueil"/>
                <?php
            }
            ?> 

        </div>
    </body>
</html>
