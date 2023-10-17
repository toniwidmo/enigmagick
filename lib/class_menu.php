<?php
	includeClass('class_content.php');

	class Menu extends Content {
		public $folder = 'menu';

		public $menu_id;
		public $menu_items = array();

		public $css = array('menu.css.php');

		function __construct($search) {
			parent::__construct($search);
		}

		function setMenuItems() {
			// Get menu items from page.
		}

		function renderMenuItems() {
			// Get menu items from page.
			foreach($this->menu_items as $menuitemtxt => $menuitemurl) {			
				include($this->getTemplate('menuitem.php'));
			}
		}

		function render() {
			include($this->getTemplate('menu.php'));
		}
	}
?>
