<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	define('BASE_PATH',realpath('.')); // For use in PHP if needed
	define('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;

	$search = '';
	$text_source = '';
	$source_name = 'Liber AL';
	if(isset($_REQUEST["search_text"])) $search = $_REQUEST["search_text"]; 

	require_once(BASE_PATH.'/config/config.php');	

	$page->search = $search;
	$page->title = 'Search on Liber AL';	

	includeClass('class_form.php');
	$form = new SearchForm($search);
	$form->form_action = 'index.php';
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
