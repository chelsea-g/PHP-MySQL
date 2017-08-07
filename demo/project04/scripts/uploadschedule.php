<?php
    require_once('startsession.php');
    require_once('header.php');
    require_once('appvars.php');
    require_once('../classes/Database.php');
    require_once('../classes/Admin.php');
        
        /* THIS NEEDS TO BE CHANGED   */
        $admin = new Admin();       ///
      ////////////////////////////////
        $flag = true;
        $page_title = 'Upload A Schedule';
    
    
    //Validate the upload schedule form
    if (isset($_POST['submit'])) {
        
        //Save the form values
        $begin_date = Database::sanitizeInput($_POST['begin_date']);
        $end_date = Database::sanitizeInput($_POST['end_date']);
        
        $manager_sch = Database::sanitizeInput($_FILES['manager_sch']['name']);
        $manager_sch_type = $_FILES['manager_sch']['type'];
        $manager_sch_size = $_FILES['manager_sch']['size'];
        
        $boh_sch = Database::sanitizeInput($_FILES['boh_sch']['name']);
        $boh_sch_type = $_FILES['boh_sch']['type'];
        $boh_sch_size = $_FILES['boh_sch']['size'];
        
        $foh_sch = Database::sanitizeInput($_FILES['foh_sch']['name']);
        $foh_sch_type = $_FILES['foh_sch']['type'];
        $foh_sch_size = $_FILES['foh_sch']['size'];
        
        $driver_sch = Database::sanitizeInput($_FILES['driver_sch']['name']);
        $driver_sch_type = $_FILES['driver_sch']['type'];
        $driver_sch_size = $_FILES['driver_sch']['size'];
        
        
        if (!empty($manager_sch) && !empty($boh_sch) && !empty($foh_sch) && !empty($driver_sch)
                && !empty($begin_date) && !empty($end_date)) {
          
            //type and size file validation
            if (($manager_sch_type == 'application/pdf') && ($boh_sch_type == 'application/pdf') && ($foh_sch_type = 'application/pdf') 
                    && ($driver_sch_type == 'application/pdf') && ($manager_sch_size < MAXFILESIZE) && ($boh_sch_size < MAXFILESIZE)
                    && ($foh_sch_size < MAXFILESIZE) && ($driver_sch_size < MAXFILESIZE)) {
                    
                    
                if (($_FILES['manager_sch']['error'] == 0) && ($_FILES['$boh_sch']['error'] == 0)
                        && ($_FILES['$foh_sch']['error'] == 0) && ($_FILES['$driver_sch']['error'] == 0)) {
                    
                    //Move the image to the target upload folder
                    $target1 = UPLOADPATH . $manager_sch;
                    $target2 = UPLOADPATH . $boh_sch;
                    $target3 = UPLOADPATH . $foh_sch;
                    $target4 = UPLOADPATH . $driver_sch;
                    
                    if ((move_uploaded_file($_FILES['manager_sch']['tmp_name'], $target1))
                            && (move_uploaded_file($_FILES['boh_sch']['tmp_name'], $target2))
                            && (move_uploaded_file($_FILES['foh_sch']['tmp_name'], $target3))
                            && (move_uploaded_file($_FILES['driver_sch']['tmp_name'], $target4))) {
                        
                        $flag = false;
                        
                        //Upload schedule to database
                        $was_added = $admin->uploadSchedule($begin_date, $end_date, $manager_sch, $boh_sch, $foh_sch, $driver_sch);
                        
                        // Confirm success with the user
                        if ($was_added) {
                            
                            echo '<p>Schedule successfully uploaded!</p>';
                            echo '<a href="viewschedule.php">View Schedule</a>';
                            
                        } else {
                            
                            echo '<p class="error">Error uploading schedule.</p>';
                            
                        }

                    } else {
                        
                        echo '<p class="error"> Sorry, there was a problem uploading the schedule.</p>';
                        
                    }
                    
                }    
                
            } else {
                
                echo '<p class="error">The uploaded schedules must be a pdf with a size less than 200KB.</p>';
                
            }
            
            //Try to delete the temp pdf files
            @unlink($_FILES['manager_sch']['tmp_name']);
            @unlink($_FILES['boh_sch']['tmp_name']);
            @unlink($_FILES['foh_sch']['tmp_name']);
            @unlink($_FILES['driver_sch']['tmp_name']);
            
        } else {
            echo '<p class="error">Please make sure that you have a pdf uploaded for each schedule, and that a begin and end date are chosen.</p>';
            
        }
        
    }
    
    if ($flag) {
        
?>
    
        <form enctype="multipart/form-data" method="post" class="form" action="<?= $_SERVER['PHP_SELF'];?>">
            
            <!--Max file size of 100kb for a pdf-->
            <input type="hidden" name="MAXFILESIZE" value="200000" />
            
            <fieldset>
                <legend>
                    <h3>Upload A Schedule</h3>
                </legend>
                <div class="leftform">
                    <label for="manager_sch">Manager</label>
                        <input type="file" accept=".pdf" id="manager_sch" name="manager_sch" value="<?php if(!empty($manager_sch)) echo $manager_sch; ?>" /><br />
                    
                    <label for="boh_sch">BOH</label>
                        <input type="file" accept=".pdf" id="boh_sch" name="boh_sch" value="<?php if(!empty($boh_sch)) echo $boh_sch; ?>" /><br />
                        
                    <label for="begin_date">Begin Date</label>
                        <input type="date" id="begin_date" name="begin_date" value="<?php if(!empty($begin_date)) echo $begin_date; ?>" /><br />
                </div>
                
                <div class="rightform">
                    <label for="foh_sch">FOH</label>
                        <input type="file" accept=".pdf" id="foh_sch" name="foh_sch" value="<?php if(!empty($foh_sch)) echo $foh_sch; ?>" /><br />
                    
                    <label for="driver_sch">Driver</label>
                        <input type="file" accept=".pdf" id="driver_sch" name="driver_sch" value="<?php if(!empty($driver_sch)) echo $driver_sch; ?>" /><br />
                    
                    <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="<?php if(!empty($end_date)) echo $end_date; ?>" /><br />
                    
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