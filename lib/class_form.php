<?php
	includeClass('class_content.php');

	class SearchForm extends Content {
		public $folder = 'form';
		public $cipher = '';
		public $text_source = '';
		public $file_source = '';
		public $form_action = 'index.php';

		public $form_id;
		public $show_custom_text = false;
		public $show_files = false;
		public $show_cipher = false;

		public $css = array('form.css.php');

		function __construct($search) {
			parent::__construct($search);
		}

		function showTextSource() {
			$this->show_custom_text = true;
		}

		function showFiles() {
			$this->show_files = true;
		}

		function showCipher() {
			$this->show_cipher = true;
		}

		function render() {
			global $ENIGMA_texts;
			$source_files = array();

			if (is_dir('texts')) {
				if ($dh = opendir('texts')) {
					while (($file = readdir($dh)) !== false) {
						if(substr($file,-4) == '.txt') {
							if(isset($ENIGMA_texts[$file])) $text_title = $ENIGMA_texts[$file]['short_title'];
							else $text_title = $file;

							$source_files[$file] = $text_title;
						}
					}
					closedir($dh);
		    	}
			}

			include($this->getTemplate('form.php'));
		}
	}
?>
