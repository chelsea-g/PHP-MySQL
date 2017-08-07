<?php

    //Start the session
    require_once('startsession.php');
    
    $page_title = 'Log In';
    require_once('header.php');
    require_once('appvars.php');
    require_once('../classes/Database.php');
    require_once('../classes/Login.php');
    
    $flag = true;


    if (!isset($_SESSION['user_id'])) {
        
        //If the user isn't logged in try to log them in by using cookies
        if (isset($_POST['submit'])) {
            
            //Get the login data from the login form
            $username = Database::sanitizeInput($_POST['username']);
            $password = Database::sanitizeInput($_POST['password']);
            
            //Look up username and password in db if user enters all fields
            if (!empty($username) && !empty($password)) {
                
                Login::logInNow($username, $password);
                $flag = false;    
            //User name and/or password are incorrect, produce error
            } else {
                    
                $error_msg = 'You must enter a valid username and password to log in.';
                            
            }
            
            //Username and/or password were left blank, produce error    
        } else {
                
            $error_msg = 'You must enter your username and password to log in.';
                
        }
    
    }
 

    if ($flag) {
?>

        <form method="post" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>
                    <h3>Log In</h3>
                </legend>
                
                <div class="centerform login">
                    
                    <label for="username">Username</label>
                        <input type="text" id="username" name="username" /><br />
                    
                    <label for="password">Password</label>
                        <input type="password" id="password" name="password" /><br />
                    
                    <input type="submit" id="submit" name="submit" />
                </div>
                
            </fieldset>
        </form>

<?php
    }   
require_once('footer.php');

?>