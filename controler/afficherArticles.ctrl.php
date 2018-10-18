<?php
    // Partie principale
    // Inclusion du modèle
    include_once("../model/DAO.class.php");
    //var_dump($articles);

    $path = null;
    if(isset($_GET['categorie']){
      $nb_art = $_GET['categorie'];
    }else {
      $nb_art =20;
    }
    if(isset($_GET['ref'])){
      $articles = $dao->getN($_GET['ref'],$nb_art);
      }
    }else{
        $articles = $dao->firstN($nb_art);
    }

    // Article suivant
      $next = $dao->next($articles[$nb_art-1]);

    // Les articles précédents
      $prev = $dao->prevN($articles[0],$nb_art);

    //
    // Charge la vue
    include("../view/articles.view.php")
    ?>
