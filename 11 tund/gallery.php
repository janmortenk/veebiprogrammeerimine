<?php
  require("../../../config_vp2019.php");
  require("functions_user.php");
  require("functions_pic.php");
  $database = "if19_jan_ki_1";
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userId"])){
	  //siis jõuga sisselogimise lehele
	  header("Location: testpage.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: testpage.php");
	  exit();
  }
 
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  $page = 1;
  $limit = 5;
  $picCount = countPics(2);

  if(isset($_GET["page"]) or $_GET["page"] < 1){
  		$page = 1;

  } elseif(round($_GET["page"] - 1) * $limit >= $picCount){
  	  $page = ceil($picCount / $limit);
  } else {
    $page = $_GET["page"];

  }
  
  $galleryHTML = readgalleryImages(2, $page, $limit);
  
  $toScript = "\t" .'<link rel="stylesheet" type="text/css" href="style/modal.css">' ."\n";
  $toScript .= "\t" .'<script type="text/javascript" src="javascript/modal.js" defer></script>' ."\n"; 
  require("header.php");
?>

  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p><a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a></p>
  <hr>
  <h2>Pildigalerii</h2>

  <!--Teeme piltide jaoks modaalakna W3 schools eeskujul-->
  <div id="myModal" class="modal">
    <!-- Sulgemisnupp-->
    <span id ="close" class="close">&times;</span>
    <!--pildikoht-->
    <img id="modalImg" class="modal-content"> alt="galeriipilt">
    <div id="caption" class="caption"></div>
    <div id="rating" class="modalcaption">
      <label><input id="rate1" name="rating" type="radio" value="1">1</label>
      <label><input id="rate2" name="rating" type="radio" value="2">2</label>
      <label><input id="rate3" name="rating" type="radio" value="3">3</label>
      <label><input id="rate4" name="rating" type="radio" value="4">4</label>
      <label><input id="rate5" name="rating" type="radio" value="5">5</label>
      <input type="button" value="Salvesta hinnang!" id="storeRating">
    </div>
  </div>

  <p>
  <?php
  	if($page > 1){
  		echo '<a href ="?page=' .($page - 1) .'">Eelmine leht</a> - ';

  	} else {
  		echo "<span>Eelmine leht</span> -";
  	}
  	if($page *$limit <= $picCount){
  		echo '<a href ="?page=' .($page + 1) .'">Järgmine leht</a> - ';
  	} else {
  		echo "<span>Eelmine leht</span> -";
  	}
  ?>

  </p>

    
   <div id="gallery">
    <?php
      echo $galleryHTML;

    ?>
	</div>
</body>
</html>
