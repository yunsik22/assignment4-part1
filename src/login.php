<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$fpath = explode('/', $_SERVER['PHP_SELF'], -1);
$fpath = implode('/', $fpath);
$redir = "http://" . $_SERVER['HTTP_HOST'] . $fpath;

echo '<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>CS290 login.php</title>
    </head>
    <body>';
    
echo "<form action='{$redir}/content1.php' method='post'>
    Username: <input type='text' name='username'>
    <br>
    <br>
    <button type='submit'>Login</button>
    </form>";   

echo '</body>
    </html>';
?>