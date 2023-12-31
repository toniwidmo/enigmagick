<?php
    // REST API
    // GET
    // no parameters
    // returns list of available search texts for finding matches in JSON format

    header("Content-Type:application/json");

	if(!defined('BASE_PATH')) DEFINE('BASE_PATH', substr(realpath('.'), 0, -5)); // For use in PHP if needed
//echo BASE_PATH;
	require_once(BASE_PATH.'/config/config.php');
    
    global $ENIGMA_texts;
    $source_files = array();

    if(ENIGMA_API) {
        if (is_dir('../texts')) {
            if ($dh = opendir('../texts')) {
                while (($file = readdir($dh)) !== false) {
                    if(substr($file,-4) == '.txt') {
                        if(isset($ENIGMA_texts[$file])) $text_title = $ENIGMA_texts[$file]['short_title'];
                        else {
                            $path_parts = pathinfo($file);

                            $text_title = $path_parts['filename'];
                            $text_title = str_replace('_',' ',$text_title);
                            $text_title = str_replace('-',' ',$text_title);
                        }

                        $source_files[] = new APIText($text_title,$file);
                    }
                }
                closedir($dh);

                response($source_files, 200, 'OK');
            } else {
                // error response
                response(NULL, 200,"No Files Found");
            }
        } else {
            // error response
            response(NULL, 400,"No Access to Files");
        }
    } else {
        response($ciphers, 423, 'This feature is currently disabled.');
    }

    function response($texts,$response_code,$response_desc){
        $response['texts'] = $texts;
        $response['response_code'] = $response_code;
        $response['response_desc'] = $response_desc;
        
        $json_response = json_encode($response);
        echo $json_response;
    }

    class APIText {
        public $title = "";
        public $file = "";

        function __construct($title, $file) {
            $this->title = $title;
            $this->file = $file;
		}
    }
?>