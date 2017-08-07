<?php
    
    //Start the session
    session_start();
            
    //If the session vars aren't yet set, try to set them with a cookie
    if (!isset($_SESSION['user_id'])) {
        

        
        if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
            
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['username'] = $_COOKIE['username'];
            
        }
        
    }
    
    //When a new session is started, make sure the message variable is empty
    if (!isset($_SESSION['message'])) {
        
        $_SESSION['message'] = "";
        
    }

?>