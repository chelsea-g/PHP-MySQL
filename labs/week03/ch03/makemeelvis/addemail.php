<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Add Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
    <?php 
        
        //Extract variables from form        
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        
        //Query command variable
        $query = "INSERT INTO email_list (first_name, last_name, email)" .
                "VALUES ('$first_name', '$last_name', '$email')";
        
        //Connect to the elvis_store database
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Error connecting to MySQL server.');
        
        //Add the customer's email and name to the database   
        mysqli_query($dbc, $query)
                or die('Error querying database.');
        
        //Close the database
        mysqli_close($dbc);
        
        //Report varification to the user
        echo 'Customer added.';
        
    ?>
</body>
</html>