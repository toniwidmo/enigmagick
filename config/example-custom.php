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

		// Define default texts
		if(!isset($ENIGMA_texts)) $ENIGMA_texts = array();

	// Examples of adding a custom text to the 'Advanced' search tab.
	// This example text file is preloaded to the 'texts' folder, but
	// You don't need to use any of them. Delete the code below, or edit it for
	// a different files of your own choosing if you will.  Define as
	// many additional texts as you desire in this way.

	// Principia Discordia
	$text = array();
	$text['file'] = 'Principia_Discordia.txt';
	$text['short_title'] = 'Principia Discordia';
	$text['title'] = 'Principia Discordia: or How I Found Goddess and what I did to her when I found her.';
	$text['author'] = 'Malaclypse the Younger and Lord Omar Ravenhurst';
	$text['about'] = 'The Holy book of Discordianism, a religion based on the Greek goddess of Chaos, Strife and Discord, namely Eris.';
	$ENIGMA_texts[] = $text;

		// Chemical Serpents
		$text = array();
		$text['file'] = 'Chemical_Serpents.txt';
		$text['short_title'] = 'Chemical Serpents';
		$text['title'] = 'Chemical Serpents: Symbols of Illumination';
		$text['author'] = 'Toni Widmo';
		$text['about'] = '';
		$ENIGMA_texts[] = $text;

		// English Words
		$text = array();
		$text['file'] = 'eng_words.txt';
		$text['short_title'] = 'English Words';
		$text['title'] = 'English Words List';
		$text['author'] = '';
		$text['about'] = '';
		$ENIGMA_texts[] = $text;

		// GoZ Words
		$text = array();
		$text['file'] = 'GoZ_word_list.txt';
		$text['short_title'] = 'GoZ Words';
		$text['title'] = 'Gematria of Zero Words List';
		$text['author'] = '';
		$text['about'] = '';
		$ENIGMA_texts[] = $text;

		// Kephi and Ketoret
		$text = array();
		$text['file'] = 'ketoret.txt';
		$text['short_title'] = 'Ketoret and Kyphi at a glance';
		$text['title'] = 'Ketoret and Kyphi at a glance';
		$text['author'] = 'Dana Widmo';
		$text['about'] = '';
		$ENIGMA_texts[] = $te

		// Kite UFO
		$text = array();
		$text['file'] = 'ufo-kite.txt';
		$text['short_title'] = 'The Kite UFO';
		$text['title'] = 'The Kite UFO';
		$text['author'] = 'Toni Widmo';
		$text['about'] = '';
		$ENIGMA_texts[] = $text;
