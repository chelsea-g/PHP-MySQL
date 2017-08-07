<?php

    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Exercise Log';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Display nav menu
    require_once('navmenu.php');
    
    //Make sure the user is logged in
    include('verifylogin.php');

    if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['type']) && isset($_GET['time_in_minutes']) && isset($_GET['heart_rate']) && isset($_GET['calories_burned'])) {
        
        // Grab the entry data from the GET
        $id = $_GET['id'];
        $date = $_GET['date'];
        $type = $_GET['type'];
        $time_in_minutes = $_GET['time_in_minutes'];
        $heart_rate = $_GET['heart_rate'];
        $calories_burned = $_GET['calories_burned'];
    
    } else if (isset($_POST['id']) && isset($_POST['type']) && isset($_POST['time_in_minutes']) && isset($_POST['date'])) {
        
        $id = $_POST['id'];
        $type = $_POST['type'];
        $time_in_minutes = $_POST['time_in_minutes'];
        $date = $_POST['date'];
        
    } else {
        
        echo '<p class="error">Sorry, no entry was specified for deletion.</p>';
        
    } 
    
    if (isset($_POST['submit'])) {
        
        if ($_POST['confirm'] == 'Yes') {
            
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
            
            // Delete the entry data from the database
            $query = "DELETE FROM exercise_log WHERE id = $id LIMIT 1";
            mysqli_query($dbc, $query);
            mysqli_close($dbc);
            
            // Confirm success with the user
            echo '<p>The entry ' . $type . ' for ' . $time_in_minutes . ' minutes on ' . $date . ' was successfully deleted.<br />';
            echo '<a href="index.php">Back to Exercise Log</a>';
        
        } else {
            
          echo '<p class="error">Entry not removed.</p>';
          
        }
        
    } else if (isset($id) && isset($date) && isset($type) && isset($time_in_minutes) && isset($heart_rate) && isset($calories_burned)) {
        
        echo '<p>Are you sure you want to delete the following entry?</p>';
        echo '<p><strong>Date: </strong>' . $date . '<br /><strong>Type: </strong>' . $type .
             '<br /><strong>Duration: </strong>' . $time_in_minutes . '<br /><strong>Heart Rate: </strong>' . 
             $heart_rate . '<br /><strong>Calories Bruned: </strong>' . $calories_burned . '</p>';
        echo '<form method="post" action="delete.php">';
        echo '<input type="radio" name="confirm" checked="checked" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" /> No <br /><br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="date" value="' . $date . '" />';
        echo '<input type="hidden" name="type" value="' . $type . '" />';
        echo '<input type="hidden" name="time_in_minutes" value="' . $time_in_minutes . '" />';
        echo '<input type="hidden" name="heart_rate" value="' . $heart_rate . '" />';
        echo '<input type="hidden" name="calories_burned" value="' . $calories_burned . '" />';
        echo '</form>';
    
    }

?>