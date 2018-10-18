<?php
  class Article {
    public $ref;
    public $prix;
    public $liblle;
    public $description;
    public $image;
    public $categorie;
    function __construct($ref, $prix, $liblle,  $description,$image, $categorie) {
      $this->ref= $ref;
      $this->prix = $prix;
      $this->libelle = $libelle;
      $this->description = $description;
      $this->image = $imgae;
      $this->categorie= $categorie;
    }
}
?>
