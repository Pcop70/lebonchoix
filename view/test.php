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
      <nav>
        <a href="#"> <img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/logoLBS.png" alt=""> </a>
      </nav>
    </header>
    <?php
    if(isset($_GET["nb_article"])){
      $n = $_GET["nb_article"];
    }else{
      $n = 20;
    }
     ?>
    <div class="corps">
      <form method="get">
        <select onchange="window.location.href='test.php?nb_article=' + this[this.selectedIndex].value">
          <option value="10" <?php if($n==10){printf("selected");} ?>>10
          <option value="20" <?php if($n==20){printf("selected");} ?>>20
          <option value="40" <?php if($n==40){printf("selected");} ?>>40
        </select>
      </form>
      <?php
        for ($i=0; $i < $n; $i++) {
          printf('<div class="article"><img src="https://raw.githubusercontent.com/Pcop70/lebonchoix/master/img/tshirt.jpg" alt="image"><h3>T-Shirt Stylin</h3></div>');
        }
       ?>
    </div>
    <footer>
      <p>footer</p>
    </footer>
  </body>
</html>
