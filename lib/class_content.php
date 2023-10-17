<?php
	/* Most basic content class.  Contains just a string to render, but provides 
	a lot of the functionality that other content classes need to inherit or override. */

	class Content {
		public $theme = 'default';
		public $folder = 'content';
		public $search = '';
		public $css = array('content.css.php');

		public $message = '';

		function __construct($search) {
			$this->search = $search;
		}

		function __get($name) {
			switch($name) {
				case 'content':
					return $this->getContent();
					break;
			}
		}

		function getTemplate($filename,$serverpath=true) {
			// Check which path we need for this template (ie
			// selected skin, default skin, mod class or default class.)
			if(file_exists(BASE_PATH.'/theme/'.$this->theme.'/'.$filename)) {
				$path_to_file = '/theme/'.$this->theme.'/'.$filename;
			} elseif(file_exists(BASE_PATH.'/theme/default/'.$filename)) {
				$path_to_file = '/theme/default/'.$filename;
			} elseif(file_exists(BASE_PATH.'/mod/'.$this->folder.'/'.$filename)) {
				$path_to_file = '/mod/'.$this->folder.'/'.$filename;
			} else {
				// All non-core content derived classes are responsible for making sure
				// include a default template for all templates they use.
				$path_to_file = '/lib/'.$this->folder.'/'.$filename;
			}

			if($serverpath) $path_to_file = BASE_PATH.$path_to_file;

			return $path_to_file;
		}

		function getCSS() {
			$css_files = array();
			foreach($this->css as $css) {
				$css_files[] = $this->getTemplate($css,false);
			}
			return $css_files;
		}

		function getContent() {
			return '';
		}

		function render() {
			include($this->getTemplate('content.php'));
		}
	}
?>
