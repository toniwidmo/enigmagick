<?php
	if(!defined('ENIGMA_SITE_TITLE')) DEFINE('ENIGMA_SITE_TITLE', 'EnigMagick');
	if(!defined('ENIGMA_THEME')) DEFINE('ENIGMA_THEME', 'default');
	if(!defined('ENIGMA_DEBUG')) DEFINE('ENIGMA_DEBUG', false);

	// Menu Items
	if(!defined('ENIGMA_LIBER_AL')) DEFINE('ENIGMA_LIBER_AL', true);
	if(!defined('ENIGMA_ADVANCED')) DEFINE('ENIGMA_ADVANCED', false); // Best not to enable unless you've added custom texts
	if(!defined('ENIGMA_CUSTOM_TEXT')) DEFINE('ENIGMA_CUSTOM_TEXT', true);
	if(!defined('ENIGMA_ABOUT')) DEFINE('ENIGMA_ABOUT', true);
	if(!defined('ENIGMA_HELP')) DEFINE('ENIGMA_HELP', true);

	global $ENIGMA_texts;
	// Define default texts
	// Liber AL vel LEGIS
	$text = array();
	$text['file'] = 'liberal.txt';
	$text['short_title'] = 'Liber AL';
	$text['title'] = 'Liber AL vel LEGIS';
	$text['author'] = 'Aiwass';
	$text['about'] = 'A book written by Aiwass, a spirit channelled by Aleister Crowley, and from which the EQ ciphers are derived. The primary Holy book of Thelema.';
	$ENIGMA_texts[$text['file']] = $text;
?>
