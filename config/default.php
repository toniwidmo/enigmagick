<?php
	if(!defined('ENIGMA_SITE_TITLE')) DEFINE('ENIGMA_SITE_TITLE', 'EnigMagick');
	if(!defined('ENIGMA_THEME')) DEFINE('ENIGMA_THEME', 'default');
	if(!defined('ENIGMA_DEBUG')) DEFINE('ENIGMA_DEBUG', false);
	if(!defined('ENIGMA_DEFAULT_PAGE')) DEFINE('ENIGMA_DEFAULT_PAGE', 'quick'); // page called from index.php

	// Menu Items
	if(!defined('ENIGMA_QUICK')) DEFINE('ENIGMA_QUICK', true);
	if(!defined('ENIGMA_ADVANCED')) DEFINE('ENIGMA_ADVANCED', false);
	if(!defined('ENIGMA_CUSTOM_TEXT')) DEFINE('ENIGMA_CUSTOM_TEXT', true);
	if(!defined('ENIGMA_ABOUT')) DEFINE('ENIGMA_ABOUT', true);
	if(!defined('ENIGMA_HELP')) DEFINE('ENIGMA_HELP', true);


	if(!defined('ENIGMA_WEBSITE')) DEFINE('ENIGMA_WEBSITE', false); // By default Web Site is switched on. You can disable and go API only, or switch API on with website still on.
	if(!defined('ENIGMA_API')) DEFINE('ENIGMA_API', false); // By default API is switched off

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
