<?php
	 function readAllFilms(){
  //loome andmebaasust filmide infot
  //loome andmebaasiühenduse ($mysqli   $conn)
  //$conn = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
  $conn = new mysqli($GLOBALS["ServerHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
  //valmistan ette päringu
  $stmt = $conn -> prepare("SELECT pealkiri FROM film ");
  echo $conn -> error;
  $filmTitle = "Tühjus";
  $filmInfoHTML = null;
  $stmt -> bind_result ($filmTitle);
  //käivitan käsu:
  $stmt -> execute();

  //sain pinu (stack) täie infot, hakkan ühekaupa võtma, kuni saab
  while ($stmt -> fetch()){ 
        $filmInfoHTML .= "<h3>" .$filmTitle ."<h3>";
  }
  // sulgen ühenduse
  $stmt -> close();
  $conn -> close();
  return $filmInfoHTML;
  }