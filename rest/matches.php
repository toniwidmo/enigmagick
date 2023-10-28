<?php
    // REST API
    // GET
    // 3 mandatory parameters
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
                $file_source = $_GET['text'];
                $cipher = $_GET['cipher'];
        } else {
            response(NULL, NULL, 400, 'Missing parameters.');
        }

        // Hard coded for now. Replace this with list of ciphers in folder once
        // that feature is ready...
        includeClass('class_matches.php');
        $matches = new Matches($search);
        $matches->file_source = $file_source;
        $matches->cipher = $cipher;
        $matches->getMatches();
    
        response($matches->matches, $matches->search_value, 200, 'OK');
    } else {
        response(NULL, NULL, 423, 'This feature is currently disabled.');
    }


    function response($matches,$value,$response_code,$response_desc){
        $response['matches'] = $matches;
        $response['value'] = $value;
        $response['response_code'] = $response_code;
        $response['response_desc'] = $response_desc;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>