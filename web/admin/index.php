<?php
include ('./lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>KIABI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">        <link href="../lib/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
        <script src="./admin/lib/jquery/monJquery.js"></script>
        <script src="./lib/php/ajax/ajax.js"></script>
        <link href="./lib/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body><?php
        if (file_exists('./pages/headerAdmin.php')) {
            require './pages/headerAdmin.php';
        }
        ?>
        <div class="container-fluid row align-items-center corp" id="txtHint">
            <?php
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "liste_articles";
            }
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            if (isset($_GET['id_user'])) {
                $_SESSION['id_user'] = $_GET['id_user'];
            }
            $path = './lib/php/' . $_SESSION['page'] . '.php';
            if (file_exists($path)) {
                include ($path);
            } else {
                ?>
                <span class="txtGras txtRouge">Contenu utile</span>
                <meta http-refresh: Content="1;url=index.php?page=liste_articles"/>
                <?php
            }
            ?>
        </div>       
    </body>
</html>
