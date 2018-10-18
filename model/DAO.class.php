 <?php
 //require_once("../model/Categorie.class.php");
 require_once("../model/article.class.php");
 // Definition de l'unique objet de DAO
 $dao = new DAO();

 class DAO {
   private $db ;
   function __construct($path) {
   private $database = 'sqlite:../data/db/bricomachin.db';

   // Constructeur chargé d'ouvrir la BD
   function __construct() {
     try {
         $this->db = new PDO('sqlite:../data/db/bricomachin.db');
           } catch (\Exception $e) {
         }
    }

    function firstN($n) {
      $req = $this->db->query("SELECT * FROM article Order by ref Limit $n ");
      $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
     return $tab;
   }

   function getN($ref,$n) {
          $req = $this->db->query("SELECT * FROM article where ref >= $ref Order by ref Limit $n");
          $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");
          return $tab;
   }
    function next(Article $a) {
          $req = $this->db->query("SELECT * FROM article where ref > $a->ref Order by ref Limit 1");
          if($req->columnCount()>0){
            $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");}
          else{
            $tab = getLast();
          }
    return $tab[0];
   }
   function prevN(Article $a,$n) {
            $req = $this->db->query("SELECT * FROM article where ref < $a->ref Order by ref DESC Limit 1 Offset $n-1");
            if($req->columnCount()>0){
              $tab = $req->fetchAll(PDO::FETCH_CLASS,"Article");}
            else{
              $tab = getFirst();
            }
            return $tab[0];
   }


 ?>
