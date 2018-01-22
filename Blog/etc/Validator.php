<?php 


namespace Core;

class Validator {


	private $error ;

	public function checkSQL($entries){


		$regex = '#<[\n\r\s]*script[^>]*[' .
		' \n\r\s]*(type\s?=\s?"text\/javascript")*>.*?<[\n\r\s]*\/script[^>]*>#i';
		$replace = '';

		//$entriesCleanJS = preg_replace($regex, $replace, $entries);

		//var_dump($entries);die();
		//var_dump($entriesCleanJS);//die();

		$sql = [
			'INSERT' => '',
			'UPDATE' => '',
			'DELETE' => '',
			'OR' => '',
			'WHERE' => ''
		];

		
		
		//$clean = strtr($entriesCleanJS, $sql);//recuperation du remplacement par  $clean
		$search = preg_match($regex, $entries, $matches);

		//var_dump($search);//die();
		//var_dump($clean);//die();
		
		//var_dump($sql);//die();

		

		if($search != null){

			$this->error =  true;

			$entriesCleanJS = preg_replace($regex, $replace, $entries);

			$clean = strtr($entriesCleanJS, $sql);
			//var_dump($clean);die();

		}else{

			$clean = strtr($entries, $sql);

			if($clean !== $entries){

				$this->error = true;
			}
			
		}
		
		 return $clean;	 
		
	}


	public function getError(){

		return $this->error;
	}



	public function setError($error){

		$this->error = $error;
	}

}