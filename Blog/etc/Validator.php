<?php 


namespace Config;

class Validator {


	private $error ;

	public function checkSQL($entries){


		$regex = '#<[\n\r\s]*script[^>]*[' .
		' \n\r\s]*(type\s?=\s?"text/javascript")*>.*?<[\n\r\s]*/script[^>]*>#i';
		$replace = '';

		$entriesCleanJS = preg_replace($regex, $replace, $entries);

		//var_dump($entries);die();
		//var_dump($entriesCleanJS);//die();

		$sql = [
			'INSERT' => '',
			'UPDATE' => '',
			'DELETE' => '',
			'OR' => '',
			'WHERE' => ''
		];

		
		
		$clean = strtr($entriesCleanJS, $sql);//recuperation du remplacement par  $clean

		
		if ($clean !== $entriesCleanJS) {

			//$this->error =  'SQL injection detected !';
			$this->error =  true;
			
		}

		return $clean; //renvoi $clean

		//var_dump($clean);//die();
		
		
	
		 
		
	}


	public function getError(){

		return $this->error;
	}



	public function setError($error){

		$this->error = $error;
	}

}