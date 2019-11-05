<?php
//klasside nimed suure algustähega
	class Test {
		//muutujad ehk properties
		private $privateNumber;     
		public $publicNumber;

		//funktsioonid ek methods
		//constructor, see on funktsioon, mis käivitub üks kord, klassi kasutusele võtmisel
		function __construct($sentNumber){
			$this->privateNumber = 72;
			$this->publicNumber = $sentNumber;
			echo "Salajase ja avaliku arvu korrutis on: " .$this->privateNumber * $this->publicNumber;
			$this->tellSecret();
		}
		//destructor, funktsioon käivitatakse, kui klass eemaldatakse, enam ei kasutata(töö lõppeb) 
		function __construct(){
			echo "klass lõpetab tegevuse";
		}
		private function tellSecret(){
			echo "Salajane number on" .$this->privateNumber;
		}
		public function tellPublicSecret(){
			echo " Salajane number on tõesti: " .$this->privateNumber;
		}
	}//klass lõppeb
