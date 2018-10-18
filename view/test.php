<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="test.css">
    <title>lebonsoviet</title>
  </head>
  <body>
    <audio src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/music/urss.mp3" autoplay loop>
    </audio>
    <header>
      <img class= "imageBan" src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoBan.png" alt="">
      <nav>
        <a href=""> <img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoLBS.png" alt="logo"> </a>
        <a href=""> <img src="http://www.free-icons-download.net/images/shopping-basket-icon-91332.png" alt="panier"> </a>
      </nav>
    </header>
    <?php
    if(isset($_GET["nb_article"])){
      $n = $_GET["nb_article"];
    }else{
      $n = 20;
    }
     ?>
     <form method="get">
       <select onchange="window.location.href='test.php?nb_article=' + this[this.selectedIndex].value">
         <option value="10" <?php if($n==10){printf("selected");} ?>>10
         <option value="20" <?php if($n==20){printf("selected");} ?>>20
         <option value="40" <?php if($n==40){printf("selected");} ?>>40
       </select>
     </form>
    <div class="corps">
      <?php
        for ($i=0; $i < $n; $i++) {
          printf('<div class="article"><img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/tshirt.jpg" alt="image"><div><h3>T-Shirt Stylin</h3> <h4>14.99 ₽</h4><button type="button">Ajouter au panier</button> </div></div>');
        }
       ?>
    </div>
    <footer>
      <p>footer</p>
    </footer>
  </body>
</html>
