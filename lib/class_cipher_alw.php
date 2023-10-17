<?php
	//echo ' test 23';

	require_once 'class_cipher.php';

	class cipher_alw extends cipher {		
		public $values2char = array (
			1 => 'A',
			2 => 'L',
			3 => 'W',
			4 => 'H',
			5 => 'S',
			6 => 'D',
			7 => 'O',
			8 => 'Z',
			9 => 'K',
			10 => 'V',
			11 => 'G',
			12 => 'R',
			13 => 'C',
			14 => 'N',
			15 => 'Y',
			16 => 'J',
			17 => 'U',
			18 => 'F',
			19 => 'Q',
			20 => 'B',
			21 => 'M',
			22 => 'X',
			23 => 'I',
			24 => 'T',
			25 => 'E',
			26 => 'P'
		);

		public $char2values = array (
			'A' => 1,
			'L' => 2,
			'W' => 3,
			'H' => 4,
			'S' => 5,
			'D' => 6,
			'O' => 7,
			'Z' => 8,
			'K' => 9,
			'V' => 10,
			'G' => 11,
			'R' => 12,
			'C' => 13,
			'N' => 14,
			'Y' => 15,
			'J' => 16,
			'U' => 17,
			'F' => 18,
			'Q' => 19,
			'B' => 20,
			'M' => 21,
			'X' => 22,
			'I' => 23,
			'T' => 24,
			'E' => 25,
			'P' => 26
		);

		function __construct($text_source = '',$file_source = '') {
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
	}	
?>
