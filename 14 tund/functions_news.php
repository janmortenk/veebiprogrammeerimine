<?php
function storenews($news, $newsTitle, $expiredate){
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO news (userid, title, content, expire) VALUES (?,?,?,?)");
	echo $conn->error; //näitab sql käsu errorit
	$stmt -> bind_param("isss", $_SESSION["userId"], $news, $newsTitle, $expiredate);
	if($stmt -> execute()) {
		$notice = "Uudis salvestati!";
	} else {
		$notice = "Uudist ei salvestatud!" .$stmt->error;
	} 
	$stmt -> close();
	$conn -> close();
	return $notice;
}

function readAllnews(){
	$newsHTML = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn -> prepare("SELECT title, content, added FROM news");
	$stmt = $conn -> prepare("SELECT title, content, added FROM news WHERE deleted IS NULL");
	echo $conn -> error;
	$stmt -> bind_result($newsFromDb, $addedFromDb, $titleFromDb);
	$stmt -> execute();
	while($stmt -> fetch()){
		$newsHTML .= "<h3>" .$titleFromDb ."</h3>";
		$newsHTML .= htmlspecialchars_decode($newsFromDb);
		$newsHTML .= "<p> Lisatud:" .$addedFromDb ."</p> \n";

	}
	if(!empty($newsHTML)){
		$newsHTML = "<ul> \n" .$newsHTML ."</ul> \n";
	} else {
		$newsHTML = "<p>Uudiseid pole!</p> \n";
	}

	$stmt -> close();
	$conn -> close();
	return $newsHTML;
}