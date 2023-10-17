<?php
	class cipher {
		public $values2char = null; // Not sure if this bit will be needed.
		public $char2values = null; // See class_cipher_alw.php for example of how this array should look.
		public $text = array();

		function __construct() {
			// do nothing
		}

		public function calculateValue($text) {
			//echo '['.$text.']';
			$caps_text = strtoupper($text);
			$chars = str_split($caps_text);
			
			$total = 0;
			foreach ($chars as $char) {
				//echo '('.$char.')';
				if(isset($this->char2values[$char])) {
					//echo '('.$char.':'.$this->char2values[$char].')';
					$total += $this->char2values[$char];
				} else {
					//echo '(char not set in '.print_r($this->chars2values,true).')';
				}
			}
			return $total;
		}

		public function getTriangle($text) {
			// Write some algorithm for getting triangle of values in suitable data format
			$words = explode(' ',$text);
			//print_r($words);

			$triangle = array();
			$last_phrases = array();

			foreach($words as $word) {
				$phrases = array();
				foreach($last_phrases as $last_phrase) {
					$phrase_words = explode(' ',$last_phrase);
					$index = count($phrase_words);
					
					$phrases[] = $last_phrase.' '.$word;
					$node = array();
					$node['text'] = $last_phrase.' '.$word;
					$node['value'] = $this->calculateValue($node['text']); 
					if(!isset($triangle[$index+1])) $triangle[$index+1] = array();
					$triangle[$index+1][] = $node;
				}
				$phrases[] = $word;
				$node = array();
				$node['text'] = $word; 
				$node['value'] = $this->calculateValue($word); 
				if(!isset($triangle[1])) $triangle[1] = array();
				$triangle[1][] = $node;
				
				// ???	= array();
				// ???	
				$last_phrases = $phrases; 
			}

			//echo '<pre>'.print_r($triangle,true).'</pre>';

			return $triangle;
		}

		public function getMatchesFromText($value) {
			// Keep an array of word combos ending in last word (starts empty)
			$word_combos = array();
			$matches = array();

			// for each new word
			foreach($this->text as $word) { 
				//echo $word.' ';
				$word_value = $this->calculateValue($word);

				// if word matches search value, add it to matches
				if($word_value == $value) {
					//echo ' Single word match ['.$word.':'.$word_value.'] = '.$value.' ';
					$matches[] = $word;
					$word_combos = array(); // Can't go higher, reset combos.
				} elseif($word_value > $value) {
					$word_combos = array(); // Gone bust, reset combos.
				} elseif($word_value != 0) {
					// else if value of word is below search value 
					// then attempt to add of all current word combos
					foreach($word_combos as $key => $word_combo) {
						$words = $word_combo.' '.$word;
						$combo_value = $this->calculateValue($words);	
						// If matches value, add combo to matches array then discard from current array
						if($combo_value == $value) {		
							//echo ' Multi word match ['.$words.':'.$combo_value.'] = '.$value.' ';					
							$matches[] = $words;
							unset($word_combos[$key]);
						} elseif($combo_value > $value) {
							// If over value, simply discard, no match found.
							unset($word_combos[$key]);
						} else {
							// If under value, keep for possible match with future words
							$word_combos[$key] = $words;
						}
					}					
					// Add word on its own as a new combo
					$word_combos[] = $word;
				}
			}

			// return list of matches
			return $matches;				
		}

		public function getMatchesFromTextNegValues($value) {
			// When the cipher can include negative values,
			// instead of going bust, we need a maximum number of words.
			$max_words = 23;

			// Keep an array of word combos ending in last word (starts empty)
			$word_combos = array();
			$matches = array();

			// for each new word
			foreach($this->text as $word) { 
				//echo $word.' ';
				$word_value = $this->calculateValue($word);

				// if word matches search value, add it to matches
				if($word_value == $value) {
					//echo ' Single word match ['.$word.':'.$word_value.'] = '.$value.' ';
					$matches[] = $word;
					$word_combos = array(); // Can't go higher, reset combos.
				} 

				// else if value of word is below search value 
				// then attempt to add of all current word combos
				foreach($word_combos as $key => $word_combo) {
					$words = $word_combo.' '.$word;
					$combo_value = $this->calculateValue($words);	
					// If matches value, add combo to matches array then discard from current array
					if($combo_value == $value) {		
						//echo ' Multi word match ['.$words.':'.$combo_value.'] = '.$value.' ';					
						$matches[] = $words;
						unset($word_combos[$key]);
					} elseif(substr_count($words,' ') > $max_words) {
						// If over value, simply discard, no match found.
						unset($word_combos[$key]);
					} else {
						// If under value, keep for possible match with future words
						$word_combos[$key] = $words;
					}
				}					
				// Add word on its own as a new combo
				$word_combos[] = $word;
				
			}

			// return list of matches
			return $matches;				
		}
	}
?>
