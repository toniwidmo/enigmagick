<?php
    // REST API
    // GET
    // no parameters
    // returns list of available ciphers in JSON format

    header("Content-Type:application/json");
    
    $ciphers = array();
    $ciphers['GoN'] = 'Gematria of Nothing';
    $ciphers['EQ'] = 'English Qaballah';

    response($ciphers, 200, 'OK');

    function response($texts,$response_code,$response_desc){
        $response['texts'] = $texts;
        $response['response_code'] = $response_code;
        $response['response_desc'] = $response_desc;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>