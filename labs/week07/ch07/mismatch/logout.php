<?php
    
    //Start the session
    session_start();
    
    //If the user is logged in, delete the session vars to log them out
    if (isset($_SESSION['user_id'])) {
        
        //Delete the session vars by clearing the 4_SESSION array
        $_SESSION = array();
        
        //Delete session cookie by setting its expiration to an hour prior (3600 seconds)
        if (isset($_COOKIE[session_name()])) {
            
            setcookie(session_name(), '', time() - 3600);
            
        }
        
        //Destroy the session
        session_destroy();
        
    }
    
    //Delete the user ID and username cookies by setting their expirations to an hour prior (3600 seconds)
    setcookie('user_id', '', time() - 3600);
    setcookie('username', '', time() - 3600);
    
    //Redirect to the homepage
    include 'redirect.php';

?>
