<?php
    include_once("../model/DAO.class.php");

    class Categorie {
        public $id;   // Identifiant
        public $nom;  // nom de la catégorie
        public $pere; // catégorie parente

        function getPath() {
            $cat = $this;
            $path = array($this->nom);
            while($cat->id != 1){
              $cat = $dao->getCat($cat->père);
              array_unshift($path,$cat->nom);
            }
            return $path;

        }
    }


?>
