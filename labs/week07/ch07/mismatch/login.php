<?php
    
    //Start session
    session_start();
    
    //Implement scripts
    require_once('connectvars.php');
    
    //Clear the error message
    $error_msg = "";
    
    //Check the cookie to see if user is logged in
    if (!isset($_SESSION['user_id'])) {
        
        //If the user isn't logged in try to log them in by using cookies
        if (isset($_POST['submit'])) {
            
            
            //Connect to mismatchdb
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            //Get the login data from the login form
            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            
            //Look up username and password in db if user enters all fields
            if (!empty($user_username) && !empty($user_password)) {
                
                //User lookup query
                $query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND " .
                        "password = SHA('$user_password')";
                
                //Run query
                $data = mysqli_query($dbc, $query); 
                
                //Make sure query returns 1 record (the user's account)
                if (mysqli_num_rows($data) == 1) {
                    
                    //Set the current users vars
                    $row = mysqli_fetch_array($data);
                    
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    
                    //Cookie expires after 30 days (automatically logging them out)
                    setcookie('user_id', $row['user_id'], time + (60 * 60 * 24 * 30));
                    setcookie('username', $row['username'], time + (60 * 60 * 24 * 30));
                    
                    //Redirect user to homepage after login/or last visited page
                    include 'redirect.php';
                    
                //User name and/or password are incorrect, produce error
                } else {
                    
                   $error_msg = 'You must enter a valid username and password to log in.';
                            
                }
            
            //Username and/or password were left blank, produce error    
            } else {
                
                $error_msg = 'You must enter your username and password to log in.';
                
            }
            
            //Close the mismatchdb
            mysqli_close($dbc);
    
        }
 
    }
    
?>

<!-- Log in form -->
<html>
<head>
  <title>Mismatch - Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  
  <h3>Mismatch - Log In</h3>
  
  <?php
  
      //Show the current error message if the user is not logged in at this point (cookie is empty)
      if (empty($_COOKIE['user_id'])) {
          
          echo '<p class="error">' . $error_msg . '<p>';
          
      
  
  ?>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <fieldset>
        
        <legend>Log In</legend>
        
        <label for="username">Username: </label>
        <input type="text" id="username" name="username"
          value="<?php if(!empty($user_username)) echo $user_username; ?>" /><br />
        
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" />
        
      </fieldset>
      
      <br />
      <input type="submit" value="Log In" name="submit" />
      
    </form>
    
    <?php

        } else {
            
            //Confirm log in to user
            echo '<p class="login">You are logged in as ' . $_COOKIE['username']
                    . '.</p>';
            
        }

    ?>
    
</body>

</html>