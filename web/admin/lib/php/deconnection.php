<?php

session_destroy();
setcookie("auth","", time() - 3600, "/");
header('location: http://localhost:8080/projet_web_2019/web/index.php?page=vetement_femme&genre=femme');
