<?php
    require_once("Student.php");
    
    //Crud - create read update destroy
    class StudentManager {
        
        public function create($name, $email) {
            
            // initialize pdo object with 3 params
            //db type;host name;db name, usrname, passwd
            $db = new PDO("mysql:host=localhost;dbname=whatever_you_named_it",
                    "root", "root");
            
            // create new record in db
            // insert new record
            //set to sql statement
            
            //IFFFF column name reserved, escape using back tick below tilda
            // SANATIZE INPUTS!!!! -- :name, and :emailAddress will be bound soon.
            $sql = "INSERT INTO students(`name`, `email`) VALUES (:name, :emailAddress)";
            
            //pass in static class variable to setattribut pdo method
            //used for handling exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //try this, if bad things happens run catch
            //this is for DEBUGGING
            try {
                //Prepare the query with pdo object
                //prepare($sqlstatement);
                $query = $db->prepare($sql);
                
                //bind the parameters to sanatize input!!!!!!!!
                $query->bindParam(":name", $name);
                $query->bindParam(":emailAddress", $email);
                
                
                //execute query
                $query->execute();
                
            } catch (Exception $ex) {
                
                //similar to outputting stacktrace in java
                echo "{$ex->getMessage()}<br/>";
                
            }
            
            return $db->lastInsertId(); //Returns the primary key of the insert that was just done!
            
        }
        
        
        public function delete($id) {
            
            // initialize pdo object with 3 params
            //db type;host name;db name, usrname, passwd
            $db = new PDO("mysql;host=localhost;dbname=whatever_you_named_it",
                    "root", "root");
            
            // DELETE RECORD
            //set to sql statement
            
            //IFFFF column name reserved, escape using back tick below tilda
            // SANATIZE INPUTS!!!! -- :name, and :emailAddress will be bound soon.
            $sql = "DELETE FROM students WHERE id=:id";
            
            //pass in static class variable to setattribut pdo method
            //used for handling exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //try this, if bad things happens run catch
            //this is for DEBUGGING
            try {
                //Prepare the query with pdo object
                //prepare($sqlstatement);
                $query = $db->prepare($sql);
                
                //bind the parameters to sanatize input!!!!!!!!
                $query->bindParam(":id", $id);
                
                //execute query
                $query->execute();
                
                //get rows affected
                $rowsAffected = $query->rowCount(); //returns number of rows in table
                
                
            } catch (Exception $ex) {
                
                //similar to outputting stacktrace in java
                echo "{$ex->getMessage()}<br/>";
                
            }
            
            return $db->$rowsAffected; //Returns how many records were deleted
            
        }
        
        
        
        //UPDATE ALL function
        public function updateAll($id, $name, $email) {
            
            // initialize pdo object with 3 params
            //db type;host name;db name, usrname, passwd
            $db = new PDO("mysql;host=localhost;dbname=whatever_you_named_it",
                    "root", "root");
            
            // UPDATE RECORDS
            //set to sql statement
            
            //IFFFF column name reserved, escape using back tick below tilda
            // SANATIZE INPUTS!!!! -- :name, and :emailAddress will be bound soon.
            $sql = "UPDATE students SET `name`=:name, `email`=:email WHERE id=:id";
            
            //pass in static class variable to setattribut pdo method
            //used for handling exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //try this, if bad things happens run catch
            //this is for DEBUGGING
            try {
                //Prepare the query with pdo object
                //prepare($sqlstatement);
                $query = $db->prepare($sql);
                
                //bind the parameters to sanatize input!!!!!!!!
                $query->bindParam(":id", $id);
                $query->bindParam(":name", $name);
                $query->bindParam(":email", $email);
                
                //execute query
                $query->execute();
                
                //get rows affected
                $rowsAffected = $query->rowCount(); //returns number of rows this query affects
                
                
            } catch (Exception $ex) {
                
                //similar to outputting stacktrace in java
                echo "{$ex->getMessage()}<br/>";
                
            }
            
            return $db->$rowsAffected; //Returns how many records were updated
            
        }
        
        
        
        // READ ALL
        public function readAll() {
            
            // initialize pdo object with 3 params
            //db type;host name;db name, usrname, passwd
            $db = new PDO("mysql;host=localhost;dbname=whatever_you_named_it",
                    "root", "root");
            
            // READ RECORDS
            //set to sql statement
            
            //IFFFF column name reserved, escape using back tick below tilda
            // SANATIZE INPUTS!!!! -- :name, and :emailAddress will be bound soon.
            $sql = "SELECT * FROM tablename";
            
            //pass in static class variable to setattribut pdo method
            //used for handling exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //try this, if bad things happens run catch
            //this is for DEBUGGING
            try {
                //Prepare the query with pdo object
                //prepare($sqlstatement);
                $query = $db->prepare($sql);
                
                //execute query
                $query->execute();
                
                //ONLY USE CASE FOR MAGIC GET/SET METHODS each table collumn is set to the ivars in student (ithink???)
                $results = $query->fetchAll(PDO::FETCH_CLASS, "Student"); // get all records in table
                
                
            } catch (Exception $ex) {
                
                //similar to outputting stacktrace in java
                echo "{$ex->getMessage()}<br/>";
                
            }
            
            
        
            foreach ($results as $student) {
                
                echo $student;
                
            }
            
        }
        
    }