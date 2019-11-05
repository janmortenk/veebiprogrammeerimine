<?php
	class Picupload {
		private $imageFileType;
		private $tmpPic;
		private $myTempImage;
		private $myNewImage;

		function __construct($tmpPic, $imageFileType){
			$this->imageFileType = $imageFileType; 
			$this->tmpPic = $tmpPic;
			$this->createImageFromFile();

		}
		function __destruct(){
			imagedestroy($this->myTempImage);
			imagedestroy($this->myNewImage);
		}

		private function crateImageFromFile(){
			if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
         		 $this->myTempImage = imagecreatefromjpeg($this->tmpPic);

     		 } 
      		if($this->imageFileType == "png"){
        		$this->myTempImage = imagecreatefrompng($this->tmpPic);

      		} 
      		if($this->imageFileType == "gif"){
       			 $this->myTempImage = imagecreatefromgif($this->tmpPic);

      		} 
		}//createImageFromFile lõppeb

		public function resizeImage($maxPicW, $maxPicH){
			$imageW = imagesx($this->$myTempImage);
     		$imageH = imagesy($this->$myTempImage);

      		if($imageW > $maxPicW or $imageH > $maxPicH){
          		if($imageW / $maxPicW > $imageH / $maxPicH){
             		 $picSizeRatio = $imageW / $maxPicW;

        		} else {
            		$picSizeRatio = $imageH / $maxPicH; 
        		}
        		$imageNewW = round($imageW / $picSizeRatio, 0);
        		$imageNewH = round($imageH / $picSizeRatio, 0);
        		$this->myNewImage = $this->setPicSize($this->$myTempImage, $imageW, $imageH, $imageNewW, $imageNewH);
        		}
			}//resizeImage lõppeb
			private function setPicSize($myTempImafe, $imageW, $imageH, $imageNewW, $imageNewH){
				$newImage = imagecreatetruecolor($imageNewW, $imageNewH);
				imagecopyresampled($newImage, $myTempImage, 0, 0, 0, 0, $imageNewW, $imageNewH, $imageW, $imageH);
				return $newImage
			}//setpicsize lõppeb
			
			public function addWatermark($wmFile){
				$waterMark = imagecreatefrompng($wmFile);
				$waterMarkW = imagesx($waterMark);
				$waterMarkH = imagesy($waterMark);
				$waterMarkX = imagesx($this->myNewImage) - $waterMarkW - 10;
				$waterMarkY = imagesx($this->myNewImage) - $waterMarkH - 10;
				imagecopy($this->myNewImage, $waterMark, $waterMarkX, $waterMarkY, 0, 0, $waterMarkW, $waterMarkH);
			}//add watermark lõpp
			//private function setPicSize($myTempImage) TEEE KORDA!!!!!!!

			public function savePicFile($filename){
				if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){
            		if(imagejpeg($this->myNewImage, $filename, 90)){
               		 $notice = "Vähendatud faili salvestamine õnnestus!";
           				} else {
                			$notice = "Vähendatud faili salvestamine ei õnnestunud!";
           			 	}
        		}
        		if($this->imageFileType == "png"){
           			 if(imagejpeg($this->myNewImage, $filename, 6)){
               				 $notice = "Vähendatud faili salvestamine õnnestus!";
            			} else {
               				 $notice = "Vähendatud faili salvestamine ei õnnestunud!";
            			}
        		}
        		if($this->imageFileType == "gif"){
            		if(imagejpeg($this->myNewImage, $filename)){
                			$notice = "Vähendatud faili salvestamine õnnestus!";
          			 	 } else {
                			$notice = "Vähendatud faili salvestamine ei õnnestunud!";
          			  	}
        		}
        		imagedestroy($this->myNewImage);
        		return $notice;
			}//savePicFile lõppeb


	}//klass lõppeb