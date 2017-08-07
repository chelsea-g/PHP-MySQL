<?php

    require_once('header.php');
    
    //Authorize the user for the admin page
    require_once('authorize.php');
    require_once('Blog.php');
    
    //Using the blog object to use it's methods...should be done differently...
    $admin = new Blog();
    echo '<h1>Blaahgy Admin</h1>';
    
    //List all the blogs along with a button to remove them.
    $admin->showAdminOptions();
    echo '<br />';
    
    //Link to go back to index
    echo '<small><a href="index.php">Home</a></small>';
    
    require_once('footer.php');
    

?>