<?php
    
    include_once('appvars.php');
    include_once('Database.php');
    
    class Schedule {
        
        public static function displaySchedule($type, $date) {
            
            $query = "SELECT $type FROM schedule WHERE begin_date = '$date'";
            
            $results = Database::runQuery($query);
            
            ?><script type="text/javascript" src="<?=UPLOADPATH . 'PDFObject-master/pdfobject.js'?>"></script><?php
            
            while ($row = mysqli_fetch_array($results)) {
                
            ?>
            <div class="pdf">
                <object data="<?=UPLOADPATH . $row[$type]?>" type="application/pdf">
                <p class="error">This browser does not support PDFs. Please download the PDF to view it: <a href="<?=UPLOADPATH . $row[$type]?>">Download PDF</a>.</p>
                </object>
            </div>   
            <?php
                
            }
            
        }
        
        
        //$type and $date used for sticky fields
        public static function displayDateOptions($type, $date) {
            
            $query = "SELECT begin_date FROM schedule ORDER BY begin_date DESC";
            
            $results = Database::runQuery($query);
            
            while ($row = mysqli_fetch_array($results)) {
             
            ?>    
            
                <option <?php if($date == $row['begin_date']) echo 'selected="selected"'; ?> value="<?=$row['begin_date']; ?>"><?=$row['begin_date']; ?></option>
            
            <?php    
            
            }
            
        }
        
    }

?>