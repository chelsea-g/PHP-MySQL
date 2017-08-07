<?php

    //Make sure the user is logged in, if they aren't, send them to the login page
    if (!isset($_SESSION['user_id'])){

        //Redirect to login
        $login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
        
        //Remember this page so the user can be redirected back to it after login
        $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
        
        header('Location: ' . $login_url);
        
        // add feature later...
        //if ($_SESSION['current_page'] != "/projects/project02/index.php") {
            
        //    $_SESSION['message'] = 'You must be logged in to access this page!';
            
        //}
 
    }
    
?>