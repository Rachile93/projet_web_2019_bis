<script>
    $(document).ready(function () {
        $(".r").css("font-weight", "bold");
    });
</script>
<div class="container-fluid">
    <p class="text-center"><a href="index.php?page=connextion">Se connecter</a> | <a href="index.php?page=inscription" class="r">creer un compte</a></p>
    <div class="container-fluid form-inscription bg-white">
        <form action="index.php?page=donnee_form_inscription" method="POST" class="needs-validation" novalidate>
            <label class="radio-inline"><input type="radio" name="civilite" value="Madame" checked>Madame</label>
            <label class="radio-inline"><input type="radio" name="civilite" value="Monsieur" >Monsieur</label>
            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>         
            </div>
            <div class="form-group">
                <label for="date_naissance">Date De Naissance:</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>           
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>           
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>           
            </div>
            <div class="form-group">
                <label for="pwd_confirm">Password Confirm:</label>
                <input type="password" class="form-control" id="pwd_confirm" name="pwd_confirm" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>         
            <button type="submit" class="btn btn-default" name="envoyer">Envoyer</button>
        </form>
    </div>
</div>
<script>
// Disable form submissions if there are invalid fields
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
</script>
<?php
/*
  if (file_exists('./admin/lib/php/donnee_form_inscription.php')) {
  include ('./admin/lib/php/donnee_form_inscription.php');
  } */