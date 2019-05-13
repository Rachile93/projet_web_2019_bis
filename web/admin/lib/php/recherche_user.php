<?php

try {
    $user_dao = new Utilisateur_dao($cnx);
    $data = "";
    if (isset($_POST['search']) && isset($_POST['text_search']) && !empty($_POST['text_search'])) {
        $str = $_POST['text_search'];
        $data = $user_dao->recherche_user($str);
    }

    if (isset($_GET['str']) && !empty($_GET['str'])) {
        $data = $user_dao->recherche_user($_GET['str']);
    }
    // $data = $user_dao->recherche_user($_GET['str']);
    echo '<div class="container-fluid">';
    echo '<table class = "table  table-bordered" class = "colonne_tableau">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class = "colonne_tableau ">id_user</th>';
    echo '<th class = "colonne_tableau ">nom</th>';
    echo '<th class = "colonne_tableau ">prenom</th>';
    echo '<th class = "colonne_tableau text-center">date de naissance</th>';
    echo '<th class = "colonne_tableau ">email</th>';
    echo '<th class = "colonne_tableau ">password</th>';
    echo '<th class = "colonne_tableau text-center">civilite</th>';
    echo '<th class = "colonne_tableau text-center">Supprimer</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    if (count($data) != 0) {
        for ($i = 0; $i < count($data); $i++) {
            echo '</tr>';
            echo '<td class="colonne_tableau ">' . $data[$i]['id_user'] . '</td>';
            echo '<td class="colonne_tableau ">' . $data[$i]['nom'] . '</td>';
            echo '<td class="colonne_tableau ">' . $data[$i]['prenom'] . '</td>';
            echo '<td class="colonne_tableau text-center">' . $data[$i]['date_de_naissance'] . '</td>';
            echo '<td class="colonne_tableau ">' . $data[$i]['email'] . '</td>';
            echo '<td class="colonne_tableau ">' . $data[$i]['password'] . '</td>';
            echo '<td class="colonne_tableau text-center">' . $data[$i]['civilite'] . '</td>';
            echo '<td class="colonne_tableau  text-center"><a href="index.php?page=supprimer_utilisateur&id_user=' . $data[$i]['id_user'] . '"><span class="glyphicon glyphicon-trash"></a></td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}


