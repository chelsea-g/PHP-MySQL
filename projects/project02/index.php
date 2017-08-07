<?php

    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Exercise Log';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    require_once('verifylogin.php');
    
    //Display nav menu
    require_once('navmenu.php');
    
    echo '<div class="profile">';
    
        // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
    // Grab the profile data from the database
    if (!isset($_GET['user_id'])) {
      
        $query = "SELECT username, first_name, last_name, sex, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
      
    } else {
      
        $query = "SELECT username, first_name, last_name, sex, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_GET['user_id'] . "'";
      
    }
    

    
    $data = mysqli_query($dbc, $query);
  
    if (mysqli_num_rows($data) == 1) {
      
        // The user row was found so display the user data
        $row = mysqli_fetch_array($data);
        
        echo '<table>';
        
        if (!empty($row['username'])) {
          
            echo '<tr><td class="label">Username</td><td>' . $row['username'] . '</td></tr>';
            
        }
        
        if (!empty($row['first_name'])) {
          
            echo '<tr><td class="label">First name</td><td>' . $row['first_name'] . '</td></tr>';
            
        }
        
        if (!empty($row['last_name'])) {
          
            echo '<tr><td class="label">Last name</td><td>' . $row['last_name'] . '</td></tr>';
          
        }
        
        if (!empty($row['sex'])) {
          
            echo '<tr><td class="label">Sex</td><td>';
          
            if ($row['sex'] == 'M') {
            
                echo 'Male';
            }
          
            else if ($row['sex'] == 'F') {
            
                echo 'Female';
            
            } else {
            
                echo '?';
            
            }
          
            echo '</td></tr>';
        
        }
        
        if (!empty($row['birthdate'])) {
          
            if (!isset($_GET['user_id']) || ($_COOKIE['user_id'] == $_GET['user_id'])) {
                
                // Show the user their own birthdate
                echo '<tr><td class="label">Birthdate</td><td>' . $row['birthdate'] . '</td></tr>';
              
            }
          
        }
        
        if (!empty($row['weight'])) {
            
            echo '<tr><td class="label">Weight</td><td>' . $row['weight'] . ' lbs</td>';
              
        }
        
        if (!empty($row['picture'])) {
          
            echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $row['picture'] .
              '" alt="Profile Picture" /></td></tr>';
              
        }
      
        mysqli_close($dbc);
        
        echo '</table>';
        
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        // Access exercise_log
        $query = "SELECT * FROM exercise_log WHERE user_id = " . $_SESSION['user_id'] . " ORDER BY date DESC";
        $data = mysqli_query($dbc, $query);
        
        if (empty($row['birthdate']) || empty($row['weight'])) {
          
            echo '<p>You are missing some important information needed to create your log!<br />To start adding exercises, <a href="editprofile.php">Edit Your Profile</a>.</p>';
          
          
        } else if (mysqli_num_rows($data) > 0) {
                
            $count = 1;
            
            echo '<br /><a href="addexercise.php">Add Exercise</a><br />';
            
            echo '<div class="generatecss_dot_com_table"><table><tr><td>Date</td><td>Activity</td><td>Duration</td><td>Heart Rate</td><td>Calories Burned</td><td></td></tr>';
            
            while (($row = mysqli_fetch_array($data)) && ($count <= 15)) {
                
                $count++;
                echo '<tr><td>' . $row['date'] . '</td><td>' . $row['type'] . '</td>' . 
                        '<td>' . $row['time_in_minutes'] . ' min</td><td>' . $row['heart_rate'] . 
                        ' bpm</td><td>' . $row['calories_burned'] . 
                        '</td><td><a href="delete.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . 
                        '&amp;time_in_minutes=' . $row['time_in_minutes'] . '&amp;type=' . $row['type'] .
                        '&amp;heart_rate=' . $row['heart_rate'] . '&amp;calories_burned=' . $row['calories_burned'] . 
                        '"><img src="images\trash.png" /></a></td></tr>';
                
            }
            
            echo '</table></div>';
                
            //Close exercisedb
            mysqli_close($dbc);
            
        } else {
                
                echo 'You have not logged any exercises yet. Would you like to <a href="addexercise.php">log an exercise?</a>';
                
        }
            
      
    } else {
      
        echo '<p class="error">There was a problem accessing your profile.</p>';
      
    }
  


    echo '</div>';



    
    

    
    
?>