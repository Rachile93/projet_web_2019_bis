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

            <script  type="text/javascript">
                var input = document.getElementById('image_uploads');
                var preview = document.querySelector('.preview');

                input.style.opacity = 0;
                input.addEventListener('change', updateImageDisplay);
                function updateImageDisplay() {
                    while (preview.firstChild) {
                        preview.removeChild(preview.firstChild);
                    }
                    var curFiles = input.files;
                    if (curFiles.length === 0) {
                        var para = document.createElement('p');
                        para.textContent = 'No files currently selected for upload';
                        preview.appendChild(para);
                    } else {
                        var list = document.createElement('ol');
                        preview.appendChild(list);
                        for (var i = 0; i < curFiles.length; i++) {
                            var listItem = document.createElement('li');
                            var para = document.createElement('p');
                            if (validFileType(curFiles[i])) {
                                para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';
                                var image = document.createElement('img');
                                image.src = window.URL.createObjectURL(curFiles[i]);
                                listItem.appendChild(image);
                                listItem.appendChild(para);
                            } else {
                                para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
                                listItem.appendChild(para);
                            }
                            list.appendChild(listItem);
                        }
                    }
                }
                var fileTypes = [
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png'
                ]

                function validFileType(file) {
                    for (var i = 0; i < fileTypes.length; i++) {
                        if (file.type === fileTypes[i]) {
                            return true;
                        }
                    }

                    return false;
                }
                function returnFileSize(number) {
                    if (number < 1024) {
                        return number + ' octets';
                    } else if (number >= 1024 && number < 1048576) {
                        return (number / 1024).toFixed(1) + ' Ko';
                    } else if (number >= 1048576) {
                        return (number / 1048576).toFixed(1) + ' Mo';
                    }
                }
                test_validation();
            </script>           
            <button type="submit" class="btn btn-default" name="enregistrer">Enregistrer</button>
        </form>
    </div>
</div>



<?php
if (file_exists('./lib/php/donnee_formulaire_article.php')) {
    include ('./lib/php/donnee_formulaire_article.php');
}
