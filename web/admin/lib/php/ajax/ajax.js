function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?page=recherche_user&str=" + str, true);
        xmlhttp.send();
    }
}

function supUser(id_user) {
    if (id_user.length == 0) {

    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?page=supprimer_utilisateur&id_user=" + id_user, true);
        xmlhttp.send();
    }
}
function update_quantite_pannier(quantite,id_user,id_article) {
    if (id_user.length == 0) {

    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?page=modif_quantite_pannier&quantite=" + quantite +"&id_user=" + id_user + "&id_article=" +id_article, true);
        xmlhttp.send();
    }
}

