<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Send Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
        
        //Extract subject and text from form, initialize from variable with my email
        $from = 'GREGER@madisoncollege.edu';
        $subject = $_POST['subject'];
        $text = $_POST['elvismail'];
        
        //SQL query variable        
        $query = "SELECT * FROM email_list";
        
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
    ?>
</body>
</html>