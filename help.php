<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', realpath('.')); // For use in PHP if needed
	if(!defined('BASE_URL')) DEFINE('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;

	$search = '891';

	require_once(BASE_PATH.'/config/config.php');

	$page->search = $search;
	$page->title = 'Using EnigMagick';


	$content = new Content($page->search);
	//$content->message = '<h2>Using EnigMagick</h2>';

	$content->message .= '<h3>Quick Search</h3>';
	$content->message .= '<p>In the default page, reached by pressing the "Liber AL" tab, simply enter a number, word or phrase
	that you wish to evaluate and press the "Apply Cipher" button. If you entered a number, EnigMagick will find the
	first matching word or phrase in Liber AL, if you entered a word or phrase, EnigMagick will calculate its number.
	It will then produce a word triangle for the phrase and list all matches from Liber AL. Clicking a number in the
	triangle or one of the matches from the list will run a search for value clicked in this way.</p>';

	$content->message .= '<h3>Advanced</h3>';
	$content->message .= '<p>The advanced search page, reached by pressing the "Advanced" tab, works
	in the same way except that it lets you search any <em>.txt</em> that the web host has added to
	the <em>texts</em> folder instead of Liber AL.</p>';

	$content->message .= '<h3>Custom text</h3>';
	$content->message .= '<p>The custom text search page, reached by pressing the "Custom text" tab,
	also works in the same way except that it lets you enter a body of text into a text area to search
	against instead of Liber AL. The links in the triangle and match list return to searching against
	Liber AL however.</p>';

	$page->content[] = $content;

	$page->renderPage();
	//include 'theme/default/page.php';
?>
