<?php
// Classe de gestion de la base de donnée
require_once('Article.class.php');

class DAO {
  private $db;

  // Ouverture de la base de donnée
  function __construct() {
    try {
      $this->db = new PDO('sqlite:data.db');
    }
    catch (PDOException $e){
      die("erreur de connexion:".$e->getMessage());
    }
  }

  // Methodes CRUD
  // Lecture d'un article de la base connaissant sa référence et la quantité demandée
  function read(string $ref,int $quantité=1) : Article {
    // Constuction de la requête
    $req = "SELECT * FROM article WHERE ref='$ref'";

    ///////////////////////////////////////////////////////////////////////////
    // COMPLETER ICI LANCEMENT DE LA REQUETE
    ///////////////////////////////////////////////////////////////////////////
    $sth=$dbh->query($req);
    // Lance la requête
    $result = $sth->fetchAll(PDO::FETCH_CLASS,'Article');
    $resultat->quantite = $quantite;
    // Recupère la valeur, passe à l'article la quantité demandée
    $result=array();
    // Verification que l'objet a été trouvé
    if (count($result) == 1) {
      return $result[0];
    } elseif (count($result) == 0) {
      // Aucun ou plusieurs articles trouvés
      throw new Exception('Erreur dans '.__METHOD__."(): aucun Article trouvé pour la référence '$ref'");
    } else {
      throw new Exception('Erreur dans '.__METHOD__.": trop d'Articles trouvés sous la référence '$ref'");
    }
  }

}

?>
