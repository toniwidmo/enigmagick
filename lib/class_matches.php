<?php
	includeClass('class_content.php');

	class Matches extends Content {
		public $folder = 'matches';
		public $text_source = '';
		public $file_source = '';
		public $search_value = '';
		public $cipher = '';
		public $form_action = 'index.php';
		public $matches = array();

		public $css = array('matches.css.php');

		function __construct($search) {
			parent::__construct($search);
		}

		function getMatches() {
			switch($this->cipher) {
				case 'gon':
					includeClass('class_cipher_gon.php');
					$cipher = new cipher_gon('',$this->file_source);
					break;
				default:
					includeClass('class_cipher_alw.php');
					$cipher = new cipher_alw('',$this->file_source);
					break;
			}

			$this->search_value = $cipher->calculateValue($this->search);
			if($this->search_value == 0) {
				$this->search_value = $this->search;
			}

			$this->matches = $cipher->getMatchesFromText($this->search_value);			
		}

		function getFirstMatch() {
			if(empty($this->matches)) return false;
			else return $this->matches[0];
		}

		function render() {
			if(empty($this->matches)) $this->getMatches();
			include($this->getTemplate('matches.php'));
		}
	}
?>
