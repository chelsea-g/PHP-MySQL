<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Remove Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
    <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
    <p>Please select the email addresses to delete from the email list and click Remove.</p>
    
    <!-- Self referencing form -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
    <?php
    
        //Connect to the elvis_ store database
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Error connecting to MySQL server.');
        
        //When the form is submitted, delete each checked email.
        if (isset($_POST['submit'])) {
            
            //Output an error message if no emails were selected.
            if (empty($_POST['to_delete'])) {
                
                echo 'You did not select a customer to delete.<br /><br />';
                
            } else {
                foreach ($_POST['to_delete'] as $delete_id) {
                    $query = "DELETE FROM email_list WHERE id = $delete_id";
                    
                    mysqli_query($dbc, $query)
                        or die('Error querying database.');
                        
                    echo 'Customer(s) removed.<br />';
                
                }
                
            }
            
        }
                
        //SQL query variable
        $query = "SELECT * FROM email_list";
        
        //SQL result variable
        $result = mysqli_query($dbc, $query)
                        or die('Error querying database.');
        
        //Display the customer rows with checkboxes for deleting
        while ($row = mysqli_fetch_array($result)) {
            echo '<input type="checkbox" value="' . $row['id'] . '"name="to_delete[]" />';
            echo $row['first_name'];
            echo ' ' . $row['last_name'];
            echo ' ' . $row['email'];
            echo '<br />';
        }
        
        //Close the database
        mysqli_close($dbc);
        
    ?>
    
        <input type="submit" name="submit" value="Remove" />
        
    </form>
</body>
</html>