<?php

    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Log an Exercise';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Display nav menu
    require_once('navmenu.php');
  
    //Make sure the user is logged in
    include('verifylogin.php');
    
    if (isset($_POST['submit'])) {
      
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        //Get the new exercise vars from the form
        $type = mysqli_real_escape_string($dbc, trim($_POST['type']));
        $date = mysqli_real_escape_string($dbc, trim($_POST['date']));    
        $time_in_minutes = mysqli_real_escape_string($dbc, trim($_POST['time_in_minutes'])); 
        $heart_rate = mysqli_real_escape_string($dbc, trim($_POST['heart_rate']));
        
        if (!empty($type) && !empty($date) && !empty($time_in_minutes) && !empty($heart_rate)) {
        
            //Calculate the calories burned
            $query = "SELECT sex, weight, birthdate FROM exercise_user WHERE user_id = " . $_SESSION['user_id'];
            $data = mysqli_query($dbc, $query);
            
            while ($row = mysqli_fetch_array($data)) {
                
                $birthdate = new DateTime($row['birthdate']);
                $today   = new DateTime('today');
                $age = $birthdate-> diff($today)-> y;
                
                if ($row['sex'] == 'F') {
                  
                    $calories_burned = ((-20.4022 + (0.4472 * $heart_rate) - (0.057288 * $row['weight']) + (0.074 * $age)) / 4.184) * $time_in_minutes;
                  
                } else if ($row['sex'] == 'M') {
                    
                    $calories_burned = ((-55.0969 + (0.6309 * $heart_rate) + (0.090174 * $row['weight']) + (0.2017 * $age)) / 4.184) * $time_in_minutes;
                    
                } else {
                  
                    echo 'A query error has occured.';
                  
                }
                
            }
            
            //Add the submitted exercise to the user's log
            $query = "INSERT INTO exercise_log (user_id, type, date, time_in_minutes, heart_rate, calories_burned)" .
                    "VALUES(" . $_SESSION['user_id'] . ", '$type', '$date', '$time_in_minutes', '$heart_rate', '$calories_burned')";
            
            mysqli_query($dbc, $query);
            
            //Close the db
            mysqli_close($dbc);
            
            //Ouput success
            echo "Exercise Added.";
            
        } else {
            
            echo '<p>Please make sure you have entered all of the information about your exercise.</p>';
            
        }
        
    }
    
    
?>

<p>
   Provide the following information to log an exercise. <br />
</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
  <fieldset>
    <legend>Exercise Info</legend>
    <label for="type" class="form">Type</label>
    
    <select required name="type">
      <option class="placeholder" selected disabled="disabled" value="">Choose an Exercise</option>
      <option value="Running">Running</option>
      <option value="Walking">Walking</option>
      <option value="Swimming">Swimming</option>
      <option value="Weightlifting">Weightlifting</option>
      <option value="Jump Roping">Jump Roping</option>
      <option value="Sport">Sport</option>
      <option value="Other">Other</option>
    </select>
    <br />
    
    <label for="date" class="form">Date</label>
    <input type="date" name="date" />
    <br />
    
    <label for="time_in_minutes" class="form">Time (in minutes)</label>
    <input type="number" min="1" max="1440" name="time_in_minutes"/>
    <br />
    
    <label for="heart_rate" class="form">Heart Rate</label>
    <input type="number" min="30" max="300" name="heart_rate"/>
    <br />
    <br />
    <input type="submit" value="Log Exercise" name="submit" class="generatecssdotcom_button_56fabb6cb8fb6" />
      
  </fieldset>
</form>

<a href="index.php">Back to Exercise Log</a>