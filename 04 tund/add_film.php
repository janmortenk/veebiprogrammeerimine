<?php
  require("../../../config_vp2019.php");
  require("functions_film.php");
  //echo $serverHost
  $userName = "Jan Morten Kivi";
  $database = "if19_jan_ki_1";

   //var_dump($_POST);
  if(isset($_POST["submitFilm"])){
  storeFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmStudio"], $_POST["filmDirector"]);
   }
  require("header.php");
  echo "<h1>" .$userName. ", veebiprogrammeerimine</h1>";
?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
 
  <hr>
  <h2>Eesti filmid</h2>
  <p>Lisa uus film andmebaasi:</p>
  <hr>
  <form method="POST">
      <label>Kirjuta filmi pealkiri</label>)
      <input type="text" name="filmTitle">
      <br>
      <label> Filmi tootmisaasta: </label>
      <input type="number" min="1912" max="2019" value="2019" name="filmYear">
      <br>
      <label> Filmi kestus (min): </label>
      <input type="number" min="1" max="300" value="80" name="filmDuration">
      <br>
      <label> Filmi žanr (min): </label>
      <input type ="text" name="filmGenre">
      <br>
      <label> Filmi tootja: </label>
      <input type ="text" name="filmStudio">
      <br>
      <label> Filmi lavastaja: </label>
      <input type ="text" name="filmDirector">
      <br>
      <input type="submit" value="Talleta filmi info" name="submitFilm">
  </form>

</body>
</html> 
