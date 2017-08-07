<?php
    require_once('startsession.php');
    require_once('../classes/Login.php');
    
    //if user not logged in: show login link
    if (!Login::isLoggedIn()) {
        
        echo '<a href="login.php" id="infologin">Log In</a>';
    
    
    //if user is logged in: show Hello, Full Name, log out link    
    } else if (Login::isLoggedIn()) {
        
        echo '<p id="info">Hello, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '!</p>';
        echo '<a href="logout.php" id="infolink">Log Out</a>';
        
    }
 

?>