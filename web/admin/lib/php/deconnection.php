<?php

session_destroy();//destruction d'une session existante
setcookie("auth","", time() - 3600, "/");//destruction d'un cookie
header('location: http://localhost:8080/projet_web_2019/web/index.php?page=vetement_femme&genre=femme');
