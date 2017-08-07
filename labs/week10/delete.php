<?php
    echo $_GET['id'];
    //SQL query variable 
    $query = "DELETE FROM word_choices WHERE id = " . $_GET['id'];
    
    //Connect to madlib database
    $dbc = mysqli_connect('localhost', 'root', '', 'madlib')
            or die('<br /><br />ERROR: Could not connect to the database.');
            
    mysqli_query($dbc, $query);        
            
    mysqli_close($dbc);
    
    header('Location: http://php-webdev-with-mysql-cgreger.c9users.io/labs/week10/addmadlib.php');
?>