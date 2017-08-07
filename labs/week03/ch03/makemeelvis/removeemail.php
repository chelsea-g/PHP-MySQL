<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Remove Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
                
        //Extract email from form
        $email = $_POST['email'];
        
        //SQL query variable
        $query = "DELETE FROM email_list WHERE email = '$email'";
        
        //Connect to the elvis_ store database
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Error connecting to MySQL server.');
        
        //Remove customer from database
        mysqli_query($dbc, $query)
                or die('Error querying database');
        
        //Close the database
        mysqli_close($dbc);
        
        //Confirm deletion 
        echo 'Customer removed: ' . $email;
        
        
    ?>
</body>
</html>