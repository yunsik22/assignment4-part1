<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function isint_ref(&$val) {
    $isint = false;
    if (is_numeric($val)) {
        if (strpos($val, '.')) {
            $diff = floatval($val) - intval($val);
            if ($diff > 0)
                $isint = false;
            else {
                $val = intval($val);
                $isint = true;
            }
        }
        else
            $isint = true;
    }   
    return $isint;
}


function prepMultTable(&$myarr) {
    // check missing parameters
    
    //if (count($_GET) != 4) {
    //    echo 'Four parameters are required. Try again!';
    //    return false;
    //}
    
    $input = '_';
    foreach($_GET as $key => $val) {
        if ($key == 'min-multiplicand')
            $input .= 'a';
        elseif ($key == 'max-multiplicand')
            $input .= 'b';
        elseif ($key == 'min-multiplier')
            $input .= 'c';
        elseif ($key == 'max-multiplier')
            $input .= 'd';
    }
    // $input => '_abcd', '_bcad', '_dbca', ....
    
    $msg = '';
    if (!strpos($input, 'a'))
        $msg .= 'min-multiplicand ';
    if (!strpos($input, 'b'))
        $msg .= 'max-multiplicand ';
    if (!strpos($input, 'c'))
        $msg .= 'min-multiplier ';
    if (!strpos($input, 'd'))
        $msg .= 'max-multiplier ';
    
    if ($msg != '') {
        echo 'Missing parameter ' . rtrim($msg) . '.';
        return false;
    }
    
    $min_nd = $_GET["min-multiplicand"];
    $max_nd = $_GET["max-multiplicand"];
    $min_er = $_GET["min-multiplier"];
    $max_er = $_GET["max-multiplier"];
    
    // check if inputs are integers
    $msg = '';
    if (!isint_ref($min_nd))
        $msg .= 'min-multiplicand ';
    if (!isint_ref($max_nd))
        $msg .= 'max-multiplicand ';
    if (!isint_ref($min_er))
        $msg .= 'min-multiplier ';
    if (!isint_ref($max_er))
        $msg .= 'max-multiplier ';
    
    if ($msg != '') {
        //$msg = rtrim($msg);
        echo $msg . 'must be an integer.';
        return false;
    }
    
    // check if min is less than or equal to max
    $msg = '';
    if ($min_nd > $max_nd)
        $msg .= 'min-multiplicand ';
    if ($min_er > $max_er)
        $msg .= 'min-multiplier ';
    
    if ($msg != '') {
        echo 'Minimum ' . $msg . 'larger than maximum.';
        return false;
    }
    
    //echo 'passed';
    
    $myarr[0] = $min_nd;
    $myarr[1] = $max_nd;
    $myarr[2] = $min_er;
    $myarr[3] = $max_er;
    
    return true;
}



echo '<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>CS290 Assignment4</title>
    </head>
    <body>';

$arr = array();
if (prepMultTable($arr)) {
    //echo 'min-multiplicand: ' . $arr[0] . '<br>';
    //echo 'max-multiplicand: ' . $arr[1] . '<br>';
    //echo 'min-multiplier  : ' . $arr[2] . '<br>';
    //echo 'max-multiplier  : ' . $arr[3] . '<br>';
    
    $h = $arr[1] - $arr[0] + 2; // height
    $w = $arr[3] - $arr[2] + 2; // width    
    
    echo '<table border="1"';
    echo '<tr><td bgcolor="#00FF00">';
    
    // take care of the first row
    for ($c = 0; $c < $w - 1; $c++)
        echo '<td align="right" bgcolor="#00FF00">' . ($arr[2] + $c);
        
    for ($r = 0; $r < $h - 1; $r++) {
        echo '<tr><td align="right" bgcolor="#00FF00">' . ($arr[0] + $r); // first coloumn for each row
        echo '<td align="right">' . (($arr[0] + $r) * $arr[2]); // second column for each row
        
        for ($c = 1; $c < $w - 1; $c++) 
            echo '<td align="right">' . ((($arr[0] + $r) * $arr[2]) + (($arr[0] + $r) * $c));
    }
    
    echo '</table>';
}


echo '</body>
    </html>';
?>