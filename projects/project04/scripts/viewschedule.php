<?php

    require_once('startsession.php');
    require_once('header.php');
    require_once('../classes/Schedule.php');
    require_once('../classes/Database.php');
    
        $flag = true;
        $page_title = 'View Schedule';
    
    
    //Validate the add employee form
    if (isset($_POST['submit'])) {
        
        $view_schedule = Database::sanitizeInput($_POST['view_schedule']);
        $begin_date = Database::sanitizeInput($_POST['begin_date']);
        
    }
    
    if ($flag) {
        
?>
    
        <form method="post" class="form viewsch" action="<?= $_SERVER['PHP_SELF'];?>">
            
            <fieldset>
                <legend>
                    <h3>View Schedule</h3>
                </legend>
                <div class="leftform">
                    <label for="view_schedule">Schedule Type</label>
                    <!-- if user is manager focus manager, if user is boh focus boh, etc... -->
                    <select class="input" id="view_schedule" name="view_schedule">
                        <option <?php if($view_schedule == "manager_sch") echo 'selected="selected"'; ?> value="manager_sch">Manager</option>
                        <option <?php if($view_schedule == "boh_sch") echo 'selected="selected"'; ?> value="boh_sch">BOH</option>
                        <option <?php if($view_schedule == "foh_sch") echo 'selected="selected"'; ?> value="foh_sch">FOH</option>
                        <option <?php if($view_schedule == "driver_sch") echo 'selected="selected"'; ?> value="driver_sch">Driver</option>
                    </select>
                    
                    <br />
                    <label for="begin_date">Begin Date</label>
                    <select class="input" id="begin_date" name="begin_date">
                        <option selected disabled>Select Date</option>
                        <?php 
                            
                            Schedule::displayDateOptions($view_schedule, $begin_date); 
                                
                        ?>
                         
                        
                    </select>
                    <br />
                    <input type="submit" id="submit" name="submit" />
                </div>
                
                <div class="rightform">
                    <?php if ( isset($view_schedule) && isset($begin_date) ) { Schedule::displaySchedule($view_schedule, $begin_date); } ?>
                    
                </div>
            </fieldset>
            
            
        </form>

    
<?php
    }

    require_once('footer.php');

?>