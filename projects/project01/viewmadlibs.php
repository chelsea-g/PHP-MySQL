<!-- Script outputs all created madlibs onto webpage in decending order -->
<h2>Look what other Madlib user's have created!</h2>
    
<?php
    
    //SQL query variable 
    $query = "SELECT * FROM word_choices ORDER BY id DESC";
    
    //Connect to madlib database
    $dbc = mysqli_connect('localhost', 'root', '', 'madlib')
            or die('<br /><br />ERROR: Could not connect to the database.');       
            
    //Initialize a result variable with and array of all the word_choices 
    //values in descending order
    $result = mysqli_query($dbc, $query)
            or die('<br /><br />ERROR: Could not query database.');
            
    
    //Output each madlib to the bottom of the webpage      
    while($row = mysqli_fetch_array($result)) {     
        
        //Array result variables
        $time_stamp = $row['time_stamp'];
        $story = $row['story'];
          
        //Output
        ?>
              
          <p2><?php echo $time_stamp . " " ?></p2>
          <p><?php echo $story . " " ?></p>
          <br />
        
        <?php
            
    }   
    
    //Close the madlib database
    mysqli_close($dbc);
    
?>

