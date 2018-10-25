<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
     <LINK rel="stylesheet" type="text/css"
     href="../article.css" title="Default Styles" media="screen">
    <title>lebonsoviet</title>
  </head>
  <body>
    <audio src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/music/urss.mp3" autoplay loop>
    </audio>
    <header>
      <img class= "imageBan" src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoBan.png" alt="">
      <nav>
        <a href="acceuil.php"><img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoLBS.png" alt="logo"></a>
        <a href=""> <img src="http://www.free-icons-download.net/images/shopping-basket-icon-91332.png" alt="panier"> </a>
        <h2>0</h2>
      </nav>
    </header>
    <div class="grid-container">
     <?php
        if(isset($article)){
          printf('<img class="grid-item" src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/article/'.$article->image.'" alt="image">');
            printf('<div class="grid-item">
            <h2>'.$article->libelle.'</h2>
            <h3> Réfèrence : '.$article->ref.' </h3>
            <p>'.$article->description.'</p>
            <h3>'.$article->prix.' ₽</h3>');
            if($article->stock < 11 ){
              printf("<h4> Il ne reste seulement que ".$article->stock." produits disponibles !<br> Dépêchez vous avant qu'il n'y en est plus !</h4>");
            }else if($article->stock == 0){
              printf("<h4> L'article est actuellement indisponible, veuillez revenir ultérieurement</h4>");
            }else if($article->stock == 1){
              printf("<h4> Il ne reste seulement que ".$article->stock." produit disponible !<br> Dépêchez vous avant qu'il n'y en est plus !</h4></h4>");
            }else{
              printf('<h4> '.$article->stock.': articles disponibles </h4>');
            }
            printf('<div >
                          <form action="" method="get" id="formPanier">
                            '.$SESSION["panier"] = $article->ref.'
                          </form>
                          <button type="submit" form="formPanier" value="Submit">Ajouter au panier</button>
                   </div>');
        }else{
            printf("<h2>Erreur : article non trouvé</h2>");
        }
     ?>

    </div>
    <footer>
      <p>footer</p>
    </footer>
  </body>
</html>
