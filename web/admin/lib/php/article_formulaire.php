<?php // cefichier est le fomulaire qui permet a l'administrateur d'encoder de nouveau articles 
?>
<div class="container-fluid">
    <div class="container-fluid form-inscription bg-white">
        <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">            
            <div class="form-group">
                <label for="nom">Nom de l'article:</label>
                <input type="text" class="form-control" id="nom" name="nom" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="prix">Prix:</label>
                <input type="number" class="form-control" id="prix" name="prix" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="type">Type:</label>
                <input type="type" class="form-control" id="type" name="type" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="quantite">Quantite:</label>
                <input type="number" class="form-control" id="quantite" name="quantite" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="couleur">Couleur:</label>
                <input type="text" class="form-control" id="couleur" name="couleur" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>            
            <div class="form-group form_art">
                <label for="taille">taille:</label>
                <input type="text" class="form-control" id="taille" name="taille" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form_art">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required="required">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="image_uploads" class="">Sélectionner des images à uploader (PNG, JPG)</label>
                <input type="file" id="image_uploads" name="image_uploads[]"  accept=".jpg, .jpeg, .png" multiple="multiple">
            </div>
            <div class="preview">
                <p>Aucun fichier sélectionné pour le moment</p>
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea type="text" class="form-control" id="description" name="description" required="required"></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>


            <button type="submit" class="btn btn-default" name="enregistrer">Enregistrer</button>
        </form>
    </div>
</div>


<?php
if (file_exists('./lib/php/donnee_formulaire_article.php')) {
    include ('./lib/php/donnee_formulaire_article.php');
}
if (file_exists('./lib/php/upload_images.php')) {
    include ('./lib/php/upload_images.php');
}