<?php
    
    include_once('Database.php');
    
    
    class Admin {
        
        
        public function addEmployee ($first_name, $last_name, $username, $temp_password, $job_id, $hire_date, $is_admin) {
            
            $query = "INSERT INTO employee (first_name, last_name, username, password, job_id, hire_date, is_admin) " 
                    . "VALUES ('$first_name', '$last_name', '$username', SHA('$temp_password'), '$job_id', '$hire_date', '$is_admin')";
                    
            $results = Database::runQuery($query);
            
            $query = "SELECT * FROM employee WHERE username = '$username'";
            
            $results = Database::runQuery($query);
            
            if (mysqli_num_rows($results) == 1) {
                
                //Successfully added.
                return true;
                
            } else {
                
                //Unsuccessfully added.
                return false;
                
            }
        }
        
        public function uploadSchedule ($begin_date, $end_date, $manager_sch, $boh_sch, $foh_sch, $driver_sch) {
            
            $query = "INSERT INTO schedule (begin_date, end_date, manager_sch, boh_sch, foh_sch, driver_sch) "
                                . "VALUES ('$begin_date', '$end_date', '$manager_sch', '$boh_sch', '$foh_sch', '$driver_sch')";
                        
            Database::runQuery($query);
            
            $query = "SELECT * FROM schedule WHERE begin_date = '$begin_date' AND end_date = '$end_date'";
            
            $results = Database::runQuery($query);
            
            if (mysqli_num_rows($results) == 1) {
                
                //Successfully added.
                return true;
                
            } else {
                
                //Unsuccessfully added.
                return false;
                
            }
            
        }
        
        //Needs some reworking (needs better where clause than first and last name...)
        public function removeEmployee($employee) {
            
            $name = explode(' ', $employee);
            
            $query = "DELETE FROM employee WHERE first_name = '$name[0]' AND last_name = '$name[1]'";
                    
            $results = Database::runQuery($query);
            
            $query = "SELECT * FROM employee WHERE first_name = '$name[0]' AND last_name = '$name[1]'";
            
            $results = Database::runQuery($query);
            
            if (mysqli_num_rows($results) == 0) {
                
                //Successfully deleted.
                return true;
                
            } else {
                
                //Unsuccessfully deleted.
                return false;
                
            }
        }
        
        
        
        public function displayEmployeeNames($employee) {
            
            $query = "SELECT first_name, last_name FROM employee ORDER BY first_name";
            
            $results = Database::runQuery($query);
            
            while ($row = mysqli_fetch_array($results)) {
                
                ?>    
                
                <option <?php if($employee == ($row['first_name'] . ' ' . $row['last_name'])) echo 'selected="selected"'; ?> value="<?=$row['first_name'] . ' ' . $row['last_name']; ?>"><?=$row['first_name'] . ' ' . $row['last_name']; ?></option>
                
                <?php   
                
            }
            
        }
        
    }

?>