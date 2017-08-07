<?php
    require_once('startsession.php');
    require_once('../classes/Login.php');    
    
    if (Login::isLoggedIn()) {
        
        //if user is logged in: output additional links: schedule, profile, logout
        ?>
        <li><a href="viewschedule.php">Schedule</a></li>
        <li><a href="viewprofile.php">Profile</a></li>
        <?php
        
        if ($_SESSION['is_admin'] == 1) {
            
            //if user is admin output additional links: upload schedule, view employees, add employee, delete employee.
            ?>
            <li><a href="uploadschedule.php">Upload Schedule</a></li>
            <li><a href="removeschedule.php">Remove Schedule</a></li>
            <li><a href="viewemployees.php">View Employees</a></li>
            <li><a href="addemployee.php">New Account</a></li>
            <li><a href="removeemployee.php">Remove Account</a></li>
            <?php
            
        }
        
        ?>
        <li><a href="logout.php">Log Out</a></li>
        <?php
    }
    
     
    
    
    
    
        
?>
    

<?php

?>