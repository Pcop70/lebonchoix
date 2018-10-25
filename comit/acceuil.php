<?php
    // Partie principale
    // Inclusion du modèle
    include_once("../model/DAO.class.php");
    //var_dump($articles);

    $path = null;
    if(isset($_GET['nb_art'])){
      $nb_art = $_GET['nb_art'];
    }else {
      $nb_art =20;
    }
    if(isset($_GET['ref'])){
      $articles = $dao->getN($_GET['ref'],$nb_art);
      if(empty($articles)){
        $articles = $dao->firstN($nb_art);
      }
    }else{
        $articles = $dao->firstN($nb_art);
    }

    // Article suivant
    $suivant=$dao->next(end($articles));


    // Les articles précédents
    $precedent=$dao->prev(reset($articles),$nb_art);
    //
    // Charge la vue
   require '../view/acceuil.php';
    ?>
