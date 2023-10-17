<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	define('BASE_PATH',realpath('.')); // For use in PHP if needed
	define('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;

	$search = '';
	$text_source = '';
	if(isset($_REQUEST["search_text"])) $search = $_REQUEST["search_text"]; 
	if(isset($_REQUEST["text_source"])) $text_source = $_REQUEST["text_source"]; 

	require_once(BASE_PATH.'/config/config.php');

	if(trim($text_source) == '') {
		$text_source = '';
		$source_name = 'Liber Al';
	} else {
		$source_name = 'Custom Text';
	} 

	$page->search = $search;
	$page->title = 'Search on Custom Text';	

	includeClass('class_form.php');
	$form = new SearchForm($search);
	$form->showTextSource();
	$form->text_source = $text_source;
	$form->form_action = 'custom_text.php';
	$page->content[] = $form;

	includeClass('class_matches.php');
	$matches = new Matches($search);
	$matches->text_source = $text_source;
	$matches->source_name = $source_name;
	$matches->getMatches();

	includeClass('class_triangle.php');
	$triangle = new Triangle($search);
	$triangle->first_match = $matches->getFirstMatch();
	
	$page->content[] = $triangle;
	$page->content[] = $matches;

	$page->renderPage();
?>
