<?php
    require_once('startsession.php');
    
    //Redirect user to homepage after login/or last visited page
    if (isset($_SESSION['current_page'])) {
        
        header("Location: ". $_SESSION['current_page']);
        
    } else {
        
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    
        header('Location: ' . $home_url);
        
    }

?>