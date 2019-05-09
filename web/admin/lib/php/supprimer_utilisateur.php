<?php
//ce fichier permet de supprimer un utilisateur dans la table utilisateur de notre base de donnee

$user_dao = new Utilisateur_dao($cnx);//ici on creer une instance de l'objet utilisateur DAO
$user_dao->delete_user(intval($_GET['id_user']));//ici on execute la methode  delete_user en lui passant en parametre  l'identifiant 
//de l'utilisateur a supprimer .il aura pour but de rechercher l'utilisateur qui porte cette identifiant et de le supprimer 
//
        
try {
  //  $user_dao = new Utilisateur_dao($cnx);
    $data = $user_dao->liste_utilisteur();//après avoir supprimer un utilisateur on relit la table
    // utilisateur (methode liste_utilisateur) qui retour un tableau qui doit etre exploiter pour afficher tout les utilisateurs
    //affiche de resultat dans un tabeau

    echo '<div class="container-fluid">';
    echo '<table class = "table  table-bordered" class="colonne_tableau">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="colonne_tableau ">id_user</th>';
    echo '<th class="colonne_tableau ">nom</th>';
    echo '<th class="colonne_tableau ">prenom</th>';
    echo '<th class="colonne_tableau text-center">date de naissance</th>';
    echo '<th class="colonne_tableau ">email</th>';
    echo '<th class="colonne_tableau ">password</th>';
    echo '<th class="colonne_tableau text-center">civilite</th>';
    echo '<th class="colonne_tableau text-center">Supprimer</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    for ($i = 0; $i < count($data); $i++) {

        echo '<tr>';
        echo '<td class="colonne_tableau ">' . $data[$i]['id_user'] . '</td>';
        echo '<td class="colonne_tableau ">' . $data[$i]['nom'] . '</td>';
        echo '<td class="colonne_tableau ">' . $data[$i]['prenom'] . '</td>';
        echo '<td class="colonne_tableau text-center">' . $data[$i]['date_de_naissance'] . '</td>';
        echo '<td class="colonne_tableau ">' . $data[$i]['email'] . '</td>';
        echo '<td class="colonne_tableau ">' . $data[$i]['password'] . '</td>';
        echo '<td class="colonne_tableau text-center">' . $data[$i]['civilite'] . '</td>';
        echo '<td class="colonne_tableau  text-center" onclick="supUser(' . $data[$i]['id_user'] . ')"><span class="glyphicon glyphicon-trash"></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}

?>
<script>
    function supUser(id_user) {
        if (id_user.length == 0) {
            
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "admin.php?page=supprimer_utilisateur&id_user=" + id_user, true);
            xmlhttp.send();
        }
    }
</script>

 