//window.alert("Näe, see töötab!");
//console.log("Näe, see töötab!");

window.onload = function(){
	document.getElementByID("submitPic").disabled =true;
	document.getElementByID("fileToUpload").addEventListener("change", chekSize);
}

function checkSize(){
	let fileToUpload = document.getElementByID("fileToUpload").files[0];
	//console.log(fileToUpload);
	if(fileToUpload.size <= 500000){
		document.getElementByID("submitPic").disabled = false;
		document.getElementByID("notice").innerHTML = "";
		
	} else {
		document.getElementByID("submitPic").disabled = true;
		document.getElementByID("notice").innerHTML = "Valitud fail on liiga suur!";
	}
	
}