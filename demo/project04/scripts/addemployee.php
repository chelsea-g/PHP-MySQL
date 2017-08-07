<?php
    
    require_once('startsession.php');
    require_once('header.php');
    require_once('../classes/Database.php');
    require_once('../classes/Admin.php');
        
        /* THIS NEEDS TO BE CHANGED   */
        $admin = new Admin();       ///
      ////////////////////////////////
        $flag = true;
        $page_title = 'Create Employee Account';
    
    
    //Validate the add employee form
    if (isset($_POST['submit'])) {
        
        //Save the form values
        $first_name = Database::sanitizeInput($_POST['first_name']);
        $last_name = Database::sanitizeInput($_POST['last_name']);
        $job_id = Database::sanitizeInput($_POST['job_id']);
        $hire_date = Database::sanitizeInput($_POST['hire_date']);
        $username = Database::sanitizeInput($_POST['username']);
        $temp_password = Database::sanitizeInput($_POST['temp_password']);
        $temp_password2 = Database::sanitizeInput($_POST['temp_password2']);
        $is_admin= Database::sanitizeInput($_POST['is_admin']);
        
        //Make sure all fields are filled and passwords match
        if ((strlen($temp_password) < 8) || (strlen($temp_password2) < 8) || ($temp_password != $temp_password2)) {
            
            echo '<p class="error">Please make sure your passwords match and that they\'re at least 8 characters long.</p>';
            
        } else {
            
            if (!empty($first_name) && !empty($last_name) && !empty($job_id)
                && !empty($hire_date) && !empty($username) && !is_null($is_admin)) {
                
                $query = "SELECT username FROM employee WHERE username = '$username'";
                $results = Database::runQuery($query);
                
                if (mysqli_num_rows($results) == 0) {
                    
                    $flag = false;
                    
                    $was_added = $admin->addEmployee($first_name, $last_name, $username, $temp_password, $job_id, $hire_date, $is_admin);
                    
                    
                    if ($was_added) {
                        
                        echo 'Employee successfully added!<br />';
                        echo '<a href="addemployee.php">Add Another</a>';
                        
                    } else {
                        
                        echo '<p class="error">Error adding employee.</p>';
                        
                    }
                    
                } else {
                    
                    echo '<p class="error">Sorry, that username is already in use.</p>';
                    
                }
                
                
            } else {
                
                echo '<p class="error">Please make sure that every field is entered.</p>';
                
            }
            
        }
        
    }
    
    if ($flag) {
?>

        <form method="post" class="form" action="<?= $_SERVER['PHP_SELF'];?>">
            
            <fieldset>
                <legend>
                    <h3>New ZaZa Hut Employee Account</h3>
                </legend>
                <div class="leftform">
                    <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php if(!empty($first_name)) echo $first_name; ?>"/><br />
                    
                    <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php if(!empty($last_name)) echo $last_name; ?>"/><br />
                        
                    <label for="job_id">Job Title</label>
                        <select class="input" id="job_id" name="job_id">
                            <option selected disabled>Choose One</option>
                            <option <?php if($job_id == "1") echo 'selected="selected"'; ?> value="1">Manager</option>
                            <option <?php if($job_id == "2") echo 'selected="selected"'; ?> value="2">FOH</option>
                            <option <?php if($job_id == "3") echo 'selected="selected"'; ?> value="3">BOH</option>
                            <option <?php if($job_id == "4") echo 'selected="selected"'; ?> value="4">Driver</option>
                        </select>
                    <br />
                    
                    <label for="hire_date">Hire Date</label>
                    <input type="date" id="hire_date" name="hire_date" value="<?php if(!empty($hire_date)) echo $hire_date; ?>"/><br />
                </div>
                
                <div class="rightform">
                    <label for="username">Desired Username</label>
                        <input type="text" id="username" name="username" value="<?php if(!empty($username)) echo $username; ?>"/><br />
                        
                    <label for="password">Temporary Password</label>
                        <input type="password" id="temp_password" name="temp_password" /><br />
                        
                    <label for="password2">Repeat Password</label>
                        <input type="password" id="temp_password2" name="temp_password2" /><br />
                    
                    <label for="is_admin" id="is_admin">Is this an admin account?</label><br />
                        <label for="yes">Yes</label><input type="radio" <?php if ($_POST['is_admin'] == '1') echo 'checked'; ?> id="is_admin" name="is_admin" value="1">
                        <label for="no">No</label><input type="radio" <?php if ($_POST['is_admin'] == '0') echo 'checked'; ?> id="is_admin" name="is_admin" value="0"> <br />
                </div>   
                <div class="centerform">
                    <input type="submit" id="submit" name="submit" />
                </div>
            </fieldset>
            
            
        </form>

    
<?php
    }

    require_once('footer.php');

?>