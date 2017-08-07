<?php
    
    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Where opposites attract!';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Display nav menu
    require_once('navmenu.php');
    
    //Connect to mismatchdb
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
                    
            //Check that username is unique by searching for it in mismatchdb
            $query = "SELECT username FROM mismatch_user WHERE username = '$username'";
            
            //Run query
            $data = mysqli_query($dbc, $query);
            
            
            //The username is unique, insert new user data into database
            if (mysqli_num_rows($data) == 0) {
                
                $query = "INSERT INTO mismatch_user (username, password, join_date) VALUES " .
                        "('$username', SHA('$password1'), NOW())";
            
                //Run query
                mysqli_query($dbc, $query);
                
                //Confirm account creation with user
                echo '<p>Your new account has been successfully created. You\'re now ready to log in and ' . 
                        '<a href="editprofile.php">edit your profile</a>.</p>';
                
                //Close the mismatchdb
                mysqli_close($dbc);
                
                //Exit script
                exit();
                
                
            //The username is not unique
            } else {
                
                echo '<p class="error">An account already exists for this username, ' . 
                        'Please try a different username.</p>';
                
                //Clear username so they can enter a new one
                $username = "";
            
            }
            
        //Form data missing, or passwords do not match    
        } else {
            
            echo '<p class="error">Please check that username and both passwords are ' . 
                    'entered, and that the passwords are identical</p>';
                
        }
        
    }
    
    //Make sure database is closed
    mysqli_close($dbc);
            
?>

<!-- Sign Up form, self refferencing -->
<p>Please enter your desired username and password to sign up for Mismatch.</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
  <fieldset>
    <legend>Registration Info</legend>
    
    <label for="username">Username: </label>
    <input type="text" id="username" name="username"
      value="<?php if(!empty($username)) echo $username; ?>" /><br />
    
    <label for="password1">Password: </label>
    <input type="password" id="password1" name="password1" /><br />
    
    <label for="password2">Retype Password: </label>
    <input type="password" id="password2" name="password2" /><br />
    
  </fieldset>
  <br />
  <input type="submit" value="Sign Up" name="submit" />
    
</form>

<?php 

    require_once('footer.php');

?>