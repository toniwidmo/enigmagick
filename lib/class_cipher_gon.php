<?php
	//echo ' test 23';

	require_once 'class_cipher.php';

	class cipher_gon extends cipher {		
		public $values2char = array (
		);

		public $char2values = array (
			'O' => -1,
			'P' => -2,
			'Q' => -3,
			'R' => -4,
			'S' => -5,
			'T' => -6,
			'U' => -7,
			'V' => -8,
			'W' => -9,
			'X' => -10,
			'Y' => -11,
			'Z' => -12,
			'N' => 0,
			'B' => 12,
			'C' => 11,
			'D' => 10,
			'E' => 9,
			'F' => 8,
			'G' => 7,
			'H' => 6,
			'I' => 5,
			'J' => 4,
			'K' => 3,
			'L' => 2,
			'M' => 1,
			'A' => 13
		);

		function __construct($text_source = '',$file_source = '') {
			$this->values2char = array_flip($this->char2values);

			if($text_source != '') {
				$words = explode(' ',$text_source);
				foreach($words as $word) $this->text[] = $word;
			} else {
				if($file_source == '') $file_source = 'liberal.txt';
				
				$source = dirname(__FILE__).'/../texts/'.$file_source;
				$lines = file($source, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

				foreach($lines as $line) {
					$words = explode(' ',$line);
					foreach($words as $word) $this->text[] = $word;
				}
			} 
		}

		public function getMatchesFromText($value) {
			// We need to use the negative values version...
			return $this->getMatchesFromTextNegValues($value);				
		}
	}	
