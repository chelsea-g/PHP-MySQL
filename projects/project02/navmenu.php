<?php
    
      

  
    //Generate the nav menu
    echo '<div class="navmenu">';
    echo '<h3>Fitme - ' . $page_title . '</h3>';
    
    if(!isset($_SESSION['username'])) {
        
        echo '<a href="login.php">Login</a><br />';
        echo '<a href="signup.php">Sign Up</a>';
    
    } else {
        
        echo 'Hello  ' . $_SESSION['username'] . '!<br />';
        echo '<a href="index.php">Exercise Log</a><br />';
        echo '<a href="editprofile.php">Edit Profile</a><br />';
        echo '<a href="logout.php">Log Out</a><br />';
      
    }
    
    
    echo '</div>';

?>