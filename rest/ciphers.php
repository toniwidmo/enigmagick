<?php
    // REST API
    // GET
    // no parameters
    // returns list of available ciphers in JSON format

    header("Content-Type:application/json");

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', substr(realpath('.'), 0, -5)); // For use in PHP if needed
//echo BASE_PATH;
	require_once(BASE_PATH.'/config/config.php');
    
    if(ENIGMA_API) {
        // Hard coded for now. Replace this with list of ciphers in folder once
        // that feature is ready...
        $ciphers = array();
        $ciphers['GoN'] = 'Gematria of Nothing';
        $ciphers['EQ'] = 'English Qaballah';
    
        response($ciphers, 200, 'OK');
    } else {
        response($ciphers, 423, 'This feature is currently disabled.');
    }


    function response($ciphers,$response_code,$response_desc){
        $response['ciphers'] = $ciphers;
        $response['response_code'] = $response_code;
        $response['response_desc'] = $response_desc;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>