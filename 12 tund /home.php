<?php
  require("../../../config_vp2019.php");
  require("functions_user.php");
  $database = "if19_jan_ki_1";

  //kontrollime, kas on sisse logitud
  if(!isset($_SESSION["userId"])){
    header("Location: testpage.php");
    exit();

  }

  //logime välja 
  if(isset($_GET["logout"])){
    session_destroy();
    header("Location: testpage.php");
    exit();
  }

  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  require("header.php");

  echo "<h1>" .$userName ." veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>

  <hr>
  <br>
  <p><?php echo $userName; ?> | Logi <a href="?logout=1">välja!</a>!</p>
  <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
    <li><a href="messages.php">Sõnumid</a></li>
    <li><a href="showfilminfo.php">Filmid</a></li>
    <li><a href="picupload.php">Piltide üleslaadimine</a></li>
    <li><a href="gallery.php">Pildigalerii</a></li>
  </ul>
 
</body>
</html>
