<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_GET['action']) && $_GET['action'] == 'end') {
    $fpath = explode('/', $_SERVER['PHP_SELF'], -1);
    $fpath = implode('/', $fpath);
    $redir = "http://" . $_SERVER['HTTP_HOST'] . $fpath;
    header("Location: {$redir}/content1.php?action=end", true);
    die();
}


session_start();

$user_name = '';

if (session_status() == PHP_SESSION_ACTIVE)
    $user_name = $_SESSION['username'];


$fpath = explode('/', $_SERVER['PHP_SELF'], -1);
$fpath = implode('/', $fpath);
$redir = "http://" . $_SERVER['HTTP_HOST'] . $fpath;

echo "<!DOCTYPE html> 
    <html lang='en'>
    <head>
        <meta charset='utf-8'/>
        <title>CS290 content2.php</title>
        <h3>Welcome to content2.php page!</h3>
    </head>
    <body>";
  

echo "Click <a href='{$redir}/content1.php?username=$user_name'>here</a> to return to content1.php page.";

echo '</body>
    </html>';
?>