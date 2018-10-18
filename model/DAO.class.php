

<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");

    // Definition de l'unique objet de DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/db/bricomachin.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
               $this->db = new PDO('sqlite:../data/db/bricomachin.db');
              } catch (\Exception $e) {
              }


        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() {
          $req = $this->db->query("SELECT * FROM categorie");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Categorie");
          return $tab;
        }
        function getFirst(){
          $req = $this->db->query("SELECT * FROM article Order by ref ASC Limit 1 ");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab[0];
        }
        function getLast(){
          $req = $this->db->query("SELECT * FROM article Order by ref DESC Limit 1 ");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab[0];
        }


        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN($n) {
          $req = $this->db->query("SELECT * FROM article Order by ref Limit $n ");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN($ref,$n) {
          $req = $this->db->query("SELECT * FROM article where ref >= $ref Order by ref Limit $n");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab;
        }
        // Acces à l'article suivant l'article dans l'ordre des références
        // Cette méthode ne rend qu'un objet de la classe Article
        function next(Article $a) {
          $req = $this->db->query("SELECT * FROM article where ref > $a->ref Order by ref Limit 1");
          if($req->columnCount()>0){
            $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");}
          else{
            $tab = getLast();
          }
          return $tab[0];

        }

        // Acces aux n articles qui précèdent de $size l'article $a dans l'ordre des références
        function prevN(Article $a,$n) {
          $req = $this->db->query("SELECT * FROM article where ref < $a->ref Order by ref DESC Limit 1 Offset $n-1");
          if($req->columnCount()>0){
            $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");}
          else{
            $tab = getFirst();
          }
          return $tab[0];

        }



        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat($id) {
          $req = $this->db->query("SELECT * FROM categorie where id =$id");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Categorie");
          return $tab[0];
        }




        // Acces au n articles à partir de la reférence $ref de la catégorie indiquée
        // Retourne une table d'objets de la classe Article
        function getNCateg($ref,$n,$categorie) {
          $req = $this->db->query("SELECT * FROM article where categorie = $categorie and ref>= $ref order by ref Limit $n");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab;

        }

    }

    ?>
