<?php
 //require_once("../model/Categorie.class.php");
 require_once("../model/article.class.php");
 // Definition de l'unique objet de DAO
 $dao = new DAO();
 class DAO {
   private $db ;
   // Constructeur chargé d'ouvrir la BD
   function __construct() {
     try {
         $this->db = new PDO('sqlite:../data/db/article.db');
           } catch (\Exception $e) {
         }
    }
    function firstN($n) {
      $req = $this->db->query("SELECT * FROM article Order by ref Limit $n ");
      $tab = $req->fetchAll(PDO::FETCH_CLASS,"article");
     return $tab;
   }
   function getN($ref,$n) {
          $req = $this->db->query("SELECT * FROM article where ref >= $ref Order by ref Limit $n");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"article");
          return $tab;
   }
    function next(article $a) {
          $req = $this->db->query("SELECT * FROM article where ref > $a->ref Order by ref Limit 1");
          if($req){
            $tab = $req->fetchAll(PDO::FETCH_CLASS,"article");}
          else{
            return null;
          }
    return reset($tab);
   }
   function prev(article $a, int $nb) {
         $req = $this->db->query("SELECT * FROM article where ref < $a->ref Order by ref DESC Limit $nb");
         if($req){
           $tab = $req->fetchAll(PDO::FETCH_CLASS,"article");}
         else{
           return null;
         }
   return end($tab);
  }

 }
 ?>
