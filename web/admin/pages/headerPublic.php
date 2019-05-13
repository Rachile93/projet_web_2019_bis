
<div class="container-fluid bg-white  div-entete" id="div-entete">
    <div class="container-fluid row align-items-center justify-content-end  div-info-session">     
        <p id="info-session-user"></p>
        <p id="deconnection"></p>
        <p id="admin"></p>               
    </div>         
    <div class="row container-fluid align-items-center justify-content-end entete" id="entete">
        <a href="index.php?page=connextion" id="creer_compte"> <p class="text-center creer-compte" id="creer_compte"><img src="admin/images/image_user.png" alt="Lights" class="pannier"><br/>se connecter/<br/>creer un compte</p></a>
        <a href="index.php?page=pannier"> <p class="text-center creer-compte"><img src="admin/images/images_pannier.jpg" alt="Lights" class="pannier"><br/>Pannier</p></a>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item accueil">
            <a class="nav-link list_nav_bar " href="index.php?page=accueil">Accueil</a>
        </li>
        <li class="nav-item femme">
            <a class="nav-link list_nav_bar " href="index.php?page=vetement_femme&genre=femme">FEMME</a>
        </li>
        <li class="nav-item homme">
            <a class="nav-link list_nav_bar " href="index.php?page=vetement_homme&genre=homme">HOMME</a>
        </li>
    </ul> 
    <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) { 
    $nom =$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];?>
        <script>
        // creation_session_user();
         creation_session_user("<?php echo $nom; ?>" , "<?php echo "$prenom"; ?>");
        </script>
    <?php } else {
        ?>
        <script>
            creation_Link_admin();
        </script>
    <?php }
    ?>
</div>