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

        <link href="lib/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
        <link href="lib/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid bg-white  div-entete" id="div-entete">
            <div class="container-fluid row align-items-center justify-content-end  div-info-session">
                <p id="info-session-user"></p>
                <p id="deconnection"></p>
                <p id="admin"></p>               
            </div>
            <div class="row container-fluid align-items-center justify-content-end entete" id="entete">
                <a href="index.php?page=connextion" id="creer_compte"> <p class="text-center creer-compte"><img src="admin/images/image_user.png" alt="Lights" class="pannier"><br/>se connecter/<br/>creer un compte</p></a>
                <a href="index.php?page=pannier"> <p class="text-center creer-compte"><img src="admin/images/images_pannier.jpg" alt="Lights" class="pannier"><br/>Pannier</p></a>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?page=accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=vetement_femme&genre=femme">FEMME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=vetement_homme&genre=homme">HOMME</a>
                </li>
            </ul> 
            <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) { ?>
                <script>
                    var element = document.getElementById("info-session-user");
                    element.innerHTML = " <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> ";
                    var deconnection = document.getElementById("deconnection");
                    var a = document.createElement("a");
                    var node = document.createTextNode("deconnection")
                    a.appendChild(node);
                    a.href = "index.php?page=deconnection";
                    deconnection.appendChild(a);
                    var div_entete = document.getElementById("entete");
                    div_entete.removeChild(document.getElementById("creer_compte"));
                </script>
            <?php } else {
                ?>
                <script>
                    var admin = document.getElementById("admin");
                    var b = document.createElement("a");
                    var node = document.createTextNode("admin")
                    b.appendChild(node);
                    b.href = "index.php?page=connectionAdmin";
                    admin.appendChild(b);
                </script>
            <?php }
            ?>
        </div>
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
        <div class="jumbotron text-center" style="margin-bottom:0;">
            <p>Footer</p>
        </div>
    </body>
</html>
