<?php
	class Page {
		public $site_title = ENIGMA_SITE_TITLE;
		public $title = 'page title';
		
		public $theme = ENIGMA_THEME;
		public $search = 'EnigMagick';

		public $css = array('enigmagick.css');

		public $header_content = array();
		public $content = array();
		public $footer_content = array();
		
		function __construct($search) {
			$this->search = $search;

			includeClass('class_menu.php');
			$menu = new Menu($this->search);
			$menu->menu = 'main';
			if(ENIGMA_LIBER_AL) $menu->menu_items['Liber AL'] = 'index.php';
			if(ENIGMA_ADVANCED) $menu->menu_items['Advanced'] = 'advanced.php';
			if(ENIGMA_CUSTOM_TEXT) $menu->menu_items['Custom text'] = 'custom_text.php';
			if(ENIGMA_ABOUT) $menu->menu_items['About'] = 'about.php';
			if(ENIGMA_HELP) $menu->menu_items['Help'] = 'help.php';
			$this->header_content[] = $menu;
		}

		function getTemplate($filename,$serverpath=true) {
			// Check which path we need for this template (ie
			// selected skin, site default, or wtg default.)
			if(file_exists(BASE_PATH.'/theme/'.$this->theme.'/'.$filename)) {
				$path_to_file = '/theme/'.$this->theme.'/'.$filename;
			} else {
				$path_to_file = '/theme/default/'.$filename;
			}

			if($serverpath) $path_to_file = BASE_PATH.$path_to_file;

			return $path_to_file;
		}

		function getCSSFiles() {
			$css_files = array();
			foreach($this->css as $css) {
				// check it exists in the selected skin, if so use that, otherwise use default
				$css_files[] = $this->getTemplate('css/'.$css,false);
			}
			foreach($this->header_content as $content) {
				$content_css = $content->getCSS();
				if(isset($content_css)) $css_files = array_merge($css_files,$content_css);
			}
			foreach($this->content as $content) {
				$content_css = $content->getCSS();
				if(isset($content_css)) $css_files = array_merge($css_files,$content_css);
			}
			foreach($this->footer_content as $content) {
				$content_css = $content->getCSS();
				if(isset($content_css)) $css_files = array_merge($css_files,$content_css);
			}
			return $css_files;
		}

		function renderHeaderContent() {
			foreach($this->header_content as $content) {
				$content->render();
			}
		}

		function renderContent() {
			foreach($this->content as $content) {
				$content->render();
			}
		}

		function renderFooterContent() {
			foreach($this->footer_content as $content) {
				$content->render();
			}
		}

		function renderPage() {
			$css_file = $this->getCSSFiles();

			include($this->getTemplate('page.php'));
		}
	}
?>
