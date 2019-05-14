function  jqCss(str) {
    $(document).ready(function () {
        $(str).css("background-color", "rgb(238, 238, 238)");
    });
}

function mise_en_gras_du_texte(str) {
    $(document).ready(function () {
        $(str).css("font-weight", "bold");
    });
}
function notif(str) {
    $(document).ready(function () {
        $('.notification').append(str);
    });
}
function creation_Link_admin() {
    $(document).ready(function () {
        $('#admin').append("<a>admin</a>");
        $('a').attr({id: "ad"});
        $('#ad').attr({href: "index.php?page=connectionAdmin"});
    });
}
function creation_session_user(nom, prenom) {
    $(document).ready(function () {
        $('#info-session-user').append(nom + " " + prenom);
        $('#deconnection').append("<a>deconnection</a>");
        $('a').attr({id: "deconnect"});
        $('#deconnect').attr({href: "index.php?page=deconnection"});
        $("#creer_compte").remove();
    });
}

function test_validation() {
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
}

