<?php

    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Sign Up';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Display nav menu
    require_once('navmenu.php');
    
    //Connect to exercisedb
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    
    //The form has been submitted
    if (isset($_POST['submit'])) {
        
        //Get the sign up vars from the form
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));    
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));    
    
    
        //Check that form is filled completely, and passwords match
        if (!empty($username) && !empty($password1) && !empty($password2) &&
                ($password1 == $password2)) {
                    
            //Check that username is unique by searching for it in excercisedb
            $query = "SELECT username FROM exercise_user WHERE username = '$username'";
            
            //Run query
            $data = mysqli_query($dbc, $query);
            
            
            //The username is unique, insert new user data into database
            if (mysqli_num_rows($data) == 0) {
                
                $query = "INSERT INTO exercise_user (username, password, join_date) VALUES " .
                        "('$username', SHA('$password1'), NOW())";
            
                //Run query
                mysqli_query($dbc, $query);
                
                //Confirm account creation with user
                echo '<p>Your new account has been successfully created. You\'re now ready to log in and ' . 
                        '<a href="editprofile.php">edit your profile</a>.</p>';
                
                //Close the exercisedb
                mysqli_close($dbc);
                
                //Exit script
                exit();
                
                
            //The username is not unique
            } else {
                
                echo '<p class="error">An account already exists for this username, ' . 
                        'please try a different username.</p>';
                
                //Clear username so they can enter a new one
                $username = "";
            
            }
            
        //Form data missing, or passwords do not match    
        } else {
            
            echo '<p class="error">Please check that username and both passwords are ' . 
                    'entered, and that the passwords are identical.</p>';
                
        }
        
    }
    
    //Make sure database is closed
    mysqli_close($dbc);
            
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p>
     Please choose your desired username and password to join Fitme! <br />
     
  </p>
  
  <fieldset>
    
    <legend>Create an Account</legend>
    
    <label for="username" class="form">Username</label>
    <input type="text" class="form" name="username" id="username" 
        value="<?php if(!empty($username)) echo $username; ?>"/><br />
  
    <label for="password1" class="form">Password</label>
    <input type="password" class="form" name="password1" id="password1" /><br />
  
  
    <label for="password2" class="form">Retype Password</label>
    <input type="password" class="form" name="password2" id="password2" /><br />
  
    <input type="submit" value="Sign Up" name="submit" />
    
  </fieldset>
  
</form>

<?php

require_once('footer.php');

?>