<div class="container-fluid bg-white div-entete" id="div-entete">        
    <div class="row container-fluid align-items-center justify-content-end entete">
        <form class="form-inline" method="POST" action="index.php?page=recherche_user">
            <input type="text" class="form-control" onkeyup="showHint(this.value)" name="text_search" id="search">
            <button type="submit" name="search" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> Search
            </button>
        </form> 
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">ARTICLES</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?page=article_formulaire">nouvelle article</a>
                <a class="dropdown-item" href="index.php?page=liste_articles">liste article</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="index.php?page=liste_utilisateur">UTILISATEURS</a>
        </li>              
    </ul> 
</div>