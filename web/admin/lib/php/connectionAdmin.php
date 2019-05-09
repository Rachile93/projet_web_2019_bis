<script>
    $(document).ready(function () {
        $(".m").css("font-weight", "bold");
    });
</script>
<div class="container-fluid">
    <p class="text-center"><a href="index.php?page=connextionAdmin" class="m">Se connecter</a>
    <div class="container-fluid form-connect bg-white">
        <form action="index.php?page=authentificationAdmin" method="POST"  class="needs-validation" novalidate>
            <div class="form-group">
                <label for="email">Email address:</label>
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
            <div class="checkbox">
                <label><input type="checkbox" name="rester_connecter" value="rester_connecter">Rester connecter</label>
            </div>
            <button type="submit" class="btn btn-default" name="se_connecter">Se connecter</button>
        </form>
        <p>Vous avez oublié votre mot de passe ? <a href="#">Réinitialisez le</a></p>
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
/*if (file_exists('./admin/lib/php/authentificationAdmin.php')) {
    include ('./admin/lib/php/authentificationAdmin.php');
}*/




