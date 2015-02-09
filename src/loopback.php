<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_json() {
    $arr = array();
    $arr['Type'] = 'GET';
    if (count($_GET) == 0)
        $arr['parameters'] = null;
    
    else {
        $arr['parameters'] = array();
       
        foreach($_GET as $key => $val) {
            if (isset($_GET[$key]))
                $arr['parameters'][$key] = $val;
            //else
                //$arr['parameters'][$key] = 'undefined';
        }
    }
    
    return json_encode($arr);
}

echo '<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>CS290 Assignment4</title>
    </head>
    <body>';

echo get_json();

echo '</body>
    </html>';
?>