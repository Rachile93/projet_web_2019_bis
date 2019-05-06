<?php

try {
    $user_dao = new Utilisateur_dao($cnx);
    $data = "";
    // $data = $user_dao->recherche_user($str);
    $data = $user_dao->recherche_user($_GET['str']);
    if (count($data) != 0) {
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<list_utilisateur>';
        for ($i = 0; $i < count($data); $i++) {
            echo '<utilisateur>';
            echo '<id_user>'.$data[$i]['id_user'].'</id_user>';
            echo '<nom>'.$data[$i]['nom'].'</nom>';
            echo '<prenom>'.$data[$i]['prenom'].'</prenom>';
            echo '<date_de_naissance>'.$data[$i]['date_de_naissance'].'</date_de_naissance>';
            echo '<email>'.$data[$i]['email'].'</email>';
            echo '<password>'.$data[$i]['password'].'</password>';
            echo '<civilite>'.$data[$i]['civilite'].'</civilite>';
            echo '</utilisateur>';
        }
        echo '</list_utilisateur>';
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}


