<?php
    require_once('startsession.php');
    require_once('../classes/Login.php');
    
    //if user not logged in: show login link
    if (!Login::isLoggedIn()) {
        
        echo '<a href="login.php" class="info">Log In</a><br />';
    
    
    //if user is logged in: show Hello, Full Name, log out link    
    } else if (Login::isLoggedIn()) {
        
        echo '<h3 class="info">Hello, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '!</h3><br />';
        echo '<a href="logout.php" class="info">Log Out</a><br />';
        
    }
 

?>