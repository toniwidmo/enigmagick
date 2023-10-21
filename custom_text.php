<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', realpath('.')); // For use in PHP if needed
	if(!defined('BASE_URL')) DEFINE('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;

	$search = '';
	$text_source = '';
	if(isset($_REQUEST["search_text"])) $search = $_REQUEST["search_text"];
	if(isset($_REQUEST["text_source"])) $text_source = $_REQUEST["text_source"];
	if(isset($_REQUEST["cipher"])) $cipher = $_REQUEST["cipher"];

	require_once(BASE_PATH.'/config/config.php');

	if(trim($text_source) == '') {
		$text_source = '';
		$source_name = 'Liber Al';
	} else {
		$source_name = 'Custom Text';
	}

	$page->search = $search;
	$page->title = 'Search on Custom Text';
	$page->cipher = $cipher;

	includeClass('class_form.php');
	$form = new SearchForm($search);
	$form->showTextSource();
	$form->cipher = $cipher;
	$form->text_source = $text_source;
	$form->form_action = 'custom_text.php';
	$page->content[] = $form;

	includeClass('class_matches.php');
	$matches = new Matches($search);
	$matches->text_source = $text_source;
	$matches->source_name = $source_name;
	$matches->cipher = $cipher;
	$matches->getMatches();

	includeClass('class_triangle.php');
	$triangle = new Triangle($search);
	$triangle->cipher = $cipher;
	$triangle->first_match = $matches->getFirstMatch();

	$page->content[] = $triangle;
	$page->content[] = $matches;

	$page->renderPage();
?>
