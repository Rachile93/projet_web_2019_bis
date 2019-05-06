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

        <link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
        <link href="../lib/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid bg-white div-entete">
            <div class="row container-fluid align-items-center justify-content-end entete">
                <form class="form-inline" method="POST" action="admin.php?page=recherche_user">
                    <input type="text" class="form-control" onkeyup="showHint(this.value)" name="text_search" id="search">
                    <button type="submit" name="search" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                </form> <?php
                if (file_exists('./lib/php/script_ajax.php')){
                    include ('./lib/php/script_ajax.php');
                }
                ?>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">ARTICLES</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="admin.php?page=article_formulaire">nouvelle article</a>
                        <a class="dropdown-item" href="admin.php?page=liste_articles">liste article</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="admin.php?page=liste_utilisateur">UTILISATEURS</a>
                </li>              
            </ul> 
        </div>
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
                <meta http-refresh: Content="1;url=admin.php?page=liste_articles"/>
                <?php
            }
            ?>  
        </div>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <p>Footer</p>
        </div>
    </body>
</html>
