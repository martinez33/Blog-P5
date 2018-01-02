<?php 


namespace Config;

class Validator {


	private $error ;

	public function checkSQL($entries){

		$sql = [
			'INSERT' => '',
			'UPDATE' => '',
			'DELETE' => '',
			'OR' => '',
			'WHERE' => '',
			'^<.>$' => ''
		];

		$temp = strtr($entries, $sql);

		//var_dump($temp);die();

		/*switch ($entries) {
			case strtr($entries, $sql):
				return $this->error = 'SQL injection detected !';
				break;
			
			default:
				return $this->error = false;
				break;
		}*/
	}




}