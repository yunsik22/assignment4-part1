<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


if (isset($_GET['action']) && $_GET['action'] == 'end') {
    $_SESSION = array();
    session_destroy();
    $fpath = explode('/', $_SERVER['PHP_SELF'], -1);
    $fpath = implode('/', $fpath);
    $redir = "http://" . $_SERVER['HTTP_HOST'] . $fpath;
    header("Location: {$redir}/login.php", true);
    die();
}


if (session_status() == PHP_SESSION_ACTIVE) {
    $fpath = explode('/', $_SERVER['PHP_SELF'], -1);
    $fpath = implode('/', $fpath);
    $redir = "http://" . $_SERVER['HTTP_HOST'] . $fpath;
        
    if (isset($_POST['username']) && trim($_POST['username']) != '') {
        $_SESSION['username'] = $_POST['username'];
    
        if (!isset($_SESSION['visit']))
            $_SESSION['visit'] = 0;
    
        $_SESSION['visit']++;
    
        echo "Hello $_SESSION[username] you have visited this page $_SESSION[visit] times before. ";
        echo "Click <a href='{$redir}/content2.php?action=end'>here</a> to logout.<br><br>";
        echo "Go to <a href='{$redir}/content2.php'>content2.php</a> page.";
    }
    
    elseif (isset($_GET['username']) && trim($_GET['username']) != '') {
        $_SESSION['username'] = $_GET['username'];
    
        if (!isset($_SESSION['visit']))
            $_SESSION['visit'] = 0;
    
        $_SESSION['visit']++;
    
        echo "Hello $_SESSION[username] you have visited this page $_SESSION[visit] times before. ";
        echo "Click <a href='{$redir}/content2.php?action=end'>here</a> to logout.<br><br>";
        echo "Go to <a href='{$redir}/content2.php'>content2.php</a> page.";
    }
    
    else 
        echo "A username must be entered. Click <a href='{$redir}/login.php'>here</a> to return to the login screen.\n";
    
}


echo '<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>CS290 content1.php</title>
    </head>
    <body>';

echo '</body>
    </html>';
?>