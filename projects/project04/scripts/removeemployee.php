<?php
    
    require_once('startsession.php');
    $page_title = 'Remove Employee Account';
    require_once('header.php');
    require_once('../classes/Database.php');
    require_once('../classes/Admin.php');
        
        /* THIS NEEDS TO BE CHANGED   */
        $admin = new Admin();       ///
      ////////////////////////////////
        $flag = true;
        
    
    
    //Validate the add employee form
    if (isset($_POST['submit'])) {
        
        //Save the form values
        $employee = Database::sanitizeInput($_POST['employee']);
        $verify = Database::sanitizeInput($_POST['verify']);
        
        
        if (!empty($employee) && !empty($verify)) {
            
            if ($verify == 1) {
                
                $flag = false;
                
                $was_removed = $admin->removeEmployee($employee);
                
                if ($was_removed) {
                    
                    echo 'Employee account successfully removed!<br />';
                    echo '<a href="removeemployee.php">Remove Another</a>';
                    
                } else {
                    
                    //needs fixing
                    echo '<p class="error">Error removing employee.</p>';
                    
                }
                    
                
            } else {
                
                $flag = false;
                echo 'No employee accounts removed.<br /><a href="removeemployee.php">Back</a>';
                
            }
                
        } else {
                
                echo '<p class="error">Please make a selection and verify it\'s removal.</p>';
                
        }
            
        
        
    }
    
    if ($flag) {
?>

        <form method="post" class="form" action="<?= $_SERVER['PHP_SELF'];?>">
            
            <fieldset>
                <legend>
                    <h3>Remove An Employee Account</h3>
                </legend>
                <div>
                    <br />
                    <label for="employee">Select an employee account to remove.</label><br /><br />
                        <select id="employee" name="employee">
                            
                            <option selected disabled>Choose One</option>
                            <?php
                            
                            $admin->displayEmployeeNames($employee);
                            
                            ?>
                            
                        </select>
                        <br /><br /><br />
                    <label for="verify">Are you sure you'd like to remove this account?</label><br /><br />
                        <label for="yes">Yes</label><input type="radio" class="stack" <?php if ($_POST['verify']) echo 'checked'; ?> id="verify" name="verify" value="1"><br />
                        <label for="no">No</label><input class="stack" type="radio" <?php if ($_POST['verify']) echo 'checked'; ?> id="verify" name="verify" value="2"><br />
                    <input type="submit" id="submit" name="submit" />
                </div>
            </fieldset>
            
            
        </form>

    
<?php
    }

    require_once('footer.php');

?>