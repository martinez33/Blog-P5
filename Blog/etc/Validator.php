<?php 

namespace Core;


class Validator {

	private $error ;


	public function checkSQL($entries)
	{


	    $regex = '#<[\n\r\s]*script[^>]*[' .
		' \n\r\s]*(type\s?=\s?"text\/javascript")*>.*?<[\n\r\s]*\/script[^>]*>#i';
		$replace = '';


		$sql = [
			'INSERT' => '',
			'UPDATE' => '',
			'DELETE' => '',
			'OR' => '',
			'WHERE' => ''
		];

		$search = preg_match($regex, $entries, $matches);

		if($search != null) {

			$this->error =  true;

			$entriesCleanJS = preg_replace($regex, $replace, $entries);

			$clean = strtr($entriesCleanJS, $sql);
			
		} else {

		    $clean = strtr($entries, $sql);

			if($clean !== $entries) {

				$this->error = true;

			}
			
		}
		
		return $clean;	 
		
	}

	public function getError()
	{

		return $this->error;

	}

	public function setError($error)
	{

		$this->error = $error;

	}

}
