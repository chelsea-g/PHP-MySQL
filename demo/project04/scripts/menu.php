<?php
    require_once('startsession.php');
    require_once('../classes/Login.php');    
    
    ?><a href="index.php">Home</a><br /><?php
    
    //if user is not logged in output links: home, login
    if (!Login::isLoggedIn()) {
        
        ?>
        <a href="login.php">Log In</a><br />
        <?php
        
    } else if (Login::isLoggedIn()) {
        
        //if user is logged in: output additional links: schedule, profile, logout
        ?>
        <a href="viewschedule.php">Schedule</a><br />
        <a href="viewprofile.php">Profile</a><br />
        <?php
        
        if ($_SESSION['is_admin'] == 1) {
            
            //if user is admin output additional links: upload schedule, view employees, add employee, delete employee.
            ?>
            <a href="uploadschedule.php">Upload Schedule</a><br />
            <a href="removeschedule.php">Remove Schedule</a><br />
            <a href="viewemployees.php">View Employees</a><br />
            <a href="addemployee.php">New Account</a><br />
            <a href="removeemployee.php">Remove Account</a><br />
            <?php
            
        }
        
        ?>
        <a href="logout.php">Log Out</a><br />
        <?php
    }
    
     
    
    
    
    
        
?>
    

<?php

?>