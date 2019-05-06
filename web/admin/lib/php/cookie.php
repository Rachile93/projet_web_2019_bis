<?php
if (isset($_COOKIE['auth']) && !isset($_SESSION['id_user'])) {
    echo 'ok1';
    $auth = $_COOKIE['auth'];
    $auth = explode("----", $auth);
    $usr_dao = new Utilisateur_dao($cnx);
    $data = $usr_dao->select_usr($auth[0]);
    $key = sha1($data[0]['email'].$data[0]['nom']);
    if ($key == $auth[1]) {
        echo 'ok2';
        $_SESSION['nom'] = $data[0]['nom'];
        $_SESSION['prenom'] = $data[0]['prenom'];
        $_SESSION['id_user'] = $data[0]['id_user'];
        setcookie("auth", $data[0]['id_user']."----".sha1($data[0]['email'].$data[0]['nom']), time()+3600 * 24 * 3, '/');
    } else {
        setcookie("auth","", time() - 3600, "/");
        echo 'erreur de creation';
    }
}