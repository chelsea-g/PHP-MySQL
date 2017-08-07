<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Send Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
    <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
    <p><strong>Private:</strong> For Elmer's use ONLY<br />
    Write and send an email to mailing list members.</p>
    
    <?php
                    
        if (isset($_POST['submit'])) {
            
            //Extract subject and text from form, initialize from variable with my email
            $from = 'GREGER@madisoncollege.edu';
            $subject = $_POST['subject'];
            $text = $_POST['elvismail'];
            $output_form = false;
    
            //SQL query variable        
            $query = "SELECT * FROM email_list";
        
            //Output an error if there is missing information in the email form
            //Send the email if all fields are filled
            if (empty($subject) && empty($text)) {
                    echo 'You forgot the email\'s subject and text.<br /><br />';
                    
                    //set boolean flag to true so that the form re outputs
                    $output_form = true;
                    
            } elseif (empty($subject)) {
                    echo 'You forgot the email\'s subject.<br /><br />';
                    
                    //set boolean flag to true so that the form re outputs
                    $output_form = true;
                    
            } elseif (empty($text)) {
                    echo 'You forgot the email\'s text.<br /><br />';
                    
                    //set boolean flag to true so that the form re outputs
                    $output_form = true;            
                    
            } elseif (!empty($subject) && !empty(text)) {
                
                //Connect to the elvis_store database
                $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                        or die('Error connecting to MySQL server.');
                        
                //Initialize a result variable with all email_list values
                $result = mysqli_query($dbc, $query)
                        or die('Error querying database.');
                
                //For each row in result, send the formatted email to each customer in the table        
                while($row = mysqli_fetch_array($result)) {     
                    
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    
                    //Format email
                    $msg = "Dear $first_name $last_name, \n $text";
                    $to = $row['email'];
                    
                    //Send the email
                    mail($to, $subject, $msg, 'From: ' . $from);
                    
                    //Confirm sent email
                    echo 'Email sent to: ' . $to . '<br />';
    
                }   
                                            
                //Close the database
                mysqli_close($dbc);
                
            } 
            
        } else {
            //Set boolean flag to true so that the form will be output normally 
            //even before any information is submitted
            $output_form = true;
            
        }
        
        //If the boolean flag is true, re output the form
        if ($output_form) {
            
    ?>
    
        <!-- Self referencing form, php echos used in form values to create sticky fields -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
          <label for="subject">Subject of email:</label><br />
          <input id="subject" name="subject" type="text" value="<?php echo $subject; ?>" size="30" /><br />
            
          <label for="elvismail">Body of email:</label><br />
          <textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
            
          <input type="submit" name="submit" value="Submit" />
        
        </form>
        
    <?php
    
        }
        
    ?>
</body>
</html>