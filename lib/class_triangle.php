<?php
	includeClass('class_content.php');

	class Triangle extends Content {
		public $folder = 'triangle';
		public $file_source = '';
		public $search_value = '';
		public $first_match = '';
		public $cipher = '';
		public $form_action = 'index.php';
		public $triangle = array();

		public $css = array('matches.css.php');

		function __construct($search) {
			parent::__construct($search);
		}

		function getValueTriangle() {
			switch(strtolower($this->cipher)) {
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
				if((int)$this->search == $this->search) $this->search = $this->first_match; 
			}

			$this->triangle = $cipher->getTriangle($this->search);			
		}

		function render() {
			if(empty($this->triangle)) $this->getValueTriangle();
			$words = explode(' ',$this->search);

			include($this->getTemplate('triangle.php'));
		}
	}
?>
