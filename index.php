<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', realpath('.')); // For use in PHP if needed
	if(!defined('BASE_URL')) DEFINE('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;
	require_once(BASE_PATH.'/config/config.php');

	switch (ENIGMA_DEFAULT_PAGE) {
		case 'about':
			require_once(BASE_PATH.'/about.php');
		  break;
		case 'advanced':
			require_once(BASE_PATH.'/advanced.php');
		  break;
		case 'custom_text':
			require_once(BASE_PATH.'/custom_text.php');
		  break;
		case 'help':
			require_once(BASE_PATH.'/help.php');
		  break;
		case 'quick':
		default:
			require_once(BASE_PATH.'/quick.php');
	}
?>
