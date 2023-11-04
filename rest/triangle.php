<?php
    // REST API
    // GET
    // 2 mandatory parameters
    // * search: Number or Phrase to search on.
    // * cipher: The cipher to use for searching
    // * text: The text file to search in for matches
    // returns a list of matches in JSON format

    header("Content-Type:application/json");

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', substr(realpath('.'), 0, -5)); // For use in PHP if needed
//echo BASE_PATH;
	require_once(BASE_PATH.'/config/config.php');
    
    if(ENIGMA_API) {

        if ((isset($_GET['search']) && $_GET['search']!="") 
            && (isset($_GET['cipher']) && $_GET['cipher']!="") 
            && (isset($_GET['text']) && $_GET['text']!="")) {
                $search = $_GET['search']; 
                $cipher = $_GET['cipher'];
                $file_source = $_GET['text'];
        } else {
            response(NULL, NULL, 400, 'Missing parameters.');
        }

        includeClass('class_matches.php');
        $matches = new Matches($search);
        $matches->file_source = $file_source;
        $matches->source_name = $source_name;
        $matches->cipher = $cipher;
        $matches->getMatches();
    
        includeClass('class_triangle.php');
        $triangle = new Triangle($search);
        $triangle->cipher = $cipher;
        $triangle->first_match = $matches->getFirstMatch();
        $triangle->getValueTriangle();
    
        response($triangle->triangle, 200, 'OK');
    } else {
        response(NULL, 423, 'This feature is currently disabled.');
    }


    function response($triangle,$response_code,$response_desc){
        $response['triangle'] = $triangle;
        $response['response_code'] = $response_code;
        $response['response_desc'] = $response_desc;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>