<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	define('BASE_PATH',realpath('./../..')); // For use in PHP if needed
	define('BASE_URL', $url); // For use in client output (css and js includes for example).

	define('KIA_SPECIAL_PAGE_CLASS',true);
	require_once(BASE_PATH.'/config/config.php');
	includeClass('class_colourscheme.php');

	$colours = new ColourScheme();

	header("Content-type: text/css");
?>
div#menu-main {
	margin: 5px;
	width: 95%;
}

div#menu-main ul {
	padding: 3px;
	width: 100%;
	--background-color: <?php echo $colours->alt_bg_main; ?>;
	list-style-type: none;
}

div#menu-main ul li {
	margin-left: 5px;
	padding: 3px;
	display: inline;
	border: 1px solid <?php echo $colours->alt_bg_third; ?>;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

div#menu-main ul li a {
	color: <?php echo $colours->link; ?>;
	text-decoration: none;
}
div#menu-main ul li a:visited {
	color: <?php echo $colours->link; ?>;
}
div#menu-main ul li a:hover {
	color: <?php echo $colours->hover; ?>;
}
div#menu-main ul li:hover {
	background-color: <?php echo $colours->alt_bg_third; ?>;
	background-color: <?php echo $colours->alt_bg_second; ?>;
}
div#menu-main ul li a:active {
	color: <?php echo $colours->active; ?>;
}
div#menu-main ul li:active {
	border: 1px solid <?php echo $colours->bg_main; ?>;
	background-color: <?php echo $colours->bg_third; ?>;
}
