<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
     <LINK rel="stylesheet" type="text/css"
     href="../test.css" title="Default Styles" media="screen">
    <title>lebonsoviet</title>
  </head>
  <body>
    <audio src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/music/urss.mp3" autoplay loop>
    </audio>
    <header>
      <img class= "imageBan" src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoBan.png" alt="">
      <nav>
        <a href="" > <img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoLBS.png" alt="logo"> </a>
        <a href=""> <img src="http://www.free-icons-download.net/images/shopping-basket-icon-91332.png" alt="panier"> </a>
      </nav>
    </header>
    <?php
    if(isset($_GET["nb_art"])){
      $n = $_GET["nb_art"];
    }else{
      $n = 20;
    }
     ?>
     <div class="nbart">
     <h3>Résultats par pages</h3>
     <form method="get">
       <select onchange="window.location.href='acceuil.php?nb_art=' + this[this.selectedIndex].value + '&ref=<?php printf($articles[0]->ref); ?>'">
         <option value="10" <?php if($n==10){printf("selected");} ?>>10
         <option value="20" <?php if($n==20){printf("selected");} ?>>20
         <option value="40" <?php if($n==40){printf("selected");} ?>>40
       </select>
     </form>
     <?php
     if($precedent!=null){
     printf('<a href="acceuil.php?ref='.$precedent->ref.'&nb_art='.$nb_art.'">precedent</a>');}
     else{
      printf('<p>precedent</p>');}
     if($suivant!=null){
     printf('<a href="acceuil.php?ref='.$suivant->ref.'&nb_art='.$nb_art.'">suivant</a>');}
     else{
      printf('<p>suivant</p>');}
     ?>
     </div>
    <div class="corps">
      <?php
        for ($i=0; $i < $n; $i++) {
          if(isset($articles[$i])){
          printf('<a href="article.php?ref='.$articles[$i]->ref.'"> <div class="article"><img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/article/'.$articles[$i]->image.'" alt="image"><h3>'.$articles[$i]->libelle.'</h3> <h4>'.$articles[$i]->prix.' ₽</h4><button type="button">Ajouter au panier</button></div> </a>');}
        }
       ?>
    </div>
    <footer>
      <p>footer</p>
    </footer>
  </body>
</html>
