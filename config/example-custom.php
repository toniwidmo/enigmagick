<?php	
	// Edit settings as required and save file as 'custom.php' in the 'config' folder.
	// Name the site what you wish...
	if(!defined('ENIGMA_SITE_TITLE')) DEFINE('ENIGMA_SITE_TITLE', 'EnigMagick');

	// Theme to use
	//if(!defined('ENIGMA_THEME')) DEFINE('ENIGMA_THEME', 'darkred');

	// Turn debugging on. Best not to on a live website.
	if(!defined('ENIGMA_DEBUG')) DEFINE('ENIGMA_DEBUG', false);

	// Menu Items
	if(!defined('ENIGMA_LIBER_AL')) DEFINE('ENIGMA_LIBER_AL', true);
	if(!defined('ENIGMA_ADVANCED')) DEFINE('ENIGMA_ADVANCED', false); // Best not to enable unless you've added custom texts
	if(!defined('ENIGMA_CUSTOM_TEXT')) DEFINE('ENIGMA_CUSTOM_TEXT', true);
	if(!defined('ENIGMA_ABOUT')) DEFINE('ENIGMA_ABOUT', true);
	if(!defined('ENIGMA_HELP')) DEFINE('ENIGMA_HELP', true);

	// Example of adding a custom text to the 'Advanced' search tab.
	// This example text file is preloaded to the 'texts' folder, but
	// You don't need to use it. Delete the code below, or edit it for
	// a different file of your own choosing if you will.  Define as
	// many additional texts as you desire in this way.

	// Define default texts
	if(!isset($ENIGMA_texts)) $ENIGMA_texts = array();

	// Principia Discordia
	$text = array();
	$text['file'] = 'Principia_Discordia.txt';
	$text['short_title'] = 'Principia Discordia';
	$text['title'] = 'Principia Discordia: or How I Found Goddess and what I did to her when I found her.';
	$text['author'] = 'Malaclypse the Younger and Lord Omar Ravenhurst';
	$text['about'] = 'The Holy book of Discordianism, a religion based on the Greek goddess of Chaos, Strife and Discord, namely Eris.';
	$ENIGMA_texts[] = $text;
