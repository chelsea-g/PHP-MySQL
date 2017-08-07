<html>
    <body>
<?php

    $regex = '/pat/i';
    $search_array = array('Fitzpatrick', 'Peggy', 'Patrick', 'Patricia', 'Johnathon');
    $newArray = preg_grep($regex, $search_array);
    print '<pre>Found ' . count($newArray) . " matches\n";
    print_r($newArray);
    
    $newArray = preg_grep($regex, $search_array, PREG_GREP_INVERT);
    print 'Found ' . count($newArray) . " that didnt match \n";
    print_r($newArray);
    print '</pre>';


    $friend = 'sam ';
    $friend2 = 'joe';
    echo 'My friends are: '. $friend. ' '. $friend2;
    
    function raise_sal() {
        
        
        global $salary;
        $salary *= 1.1;
    }
    
    $salary = 50000;
    raise_sal();
    echo '<br />new salary is: ' . $salary;
    
    print '<br /><br /><br /><br /><br />';
    
    $filename = './data.txt';
    
    print_r file_get_contents($filename);
    
    
    if (!file_exists($filename)) {
        
        exit("No such file");
        
        
    }
    
    $fh = fopen($filename, 'rb');
    while (!feof($fh)) {
        
        $line = fgets($fh);
        print $line . '<br />';
        
    }
    fclose($fh);
    
    $lines = file($filename);
    foreach ($lines as $line_num => $line) {
        
        
        $line_num++;
        echo '<b>' . $line_num. '</b>' . $line . '<br />';
    }
    
    
    $dbc = mysqli_connect('localhost', 'root', '', 'northwind');
    
    $result = mysqli_query($dbc, 'SELECT * FROM Customers');
    print '<table>';
    for ($i=0; $i < mysqli_num_fields($result); $i++) {
        
        print '<th><u> ' . mysqli_fetch_field_direct($result, $i)->name . ' </u></th>';
        
    }
    
    while ($record = mysqli_fetch_row($result)) {
        print '<tr>';
        for ($j=0; $j < mysqli_num_fields($result); $j++) {
            
            print '<td>' . $record[$j] . '</td>';
        }
        print '<tr/>';
    }
    print '</table>';
    
    
    echo '<br /><br /><br /><br /><br /><br /><br /><br />';
    
    $fh = fopen('sample6.txt', 'r');
    if (!$fh) {
        
        exit('File not found');
        
        
    }
    
    $text = fgets($fh);
    while (!feof($fh)) {
        
        $new = preg_replace('/(\w+)\s(\w+)\s(\w+)/', '$2, $1, $3' , $text);
        echo $new . '<br/>';
        $text = fgets($fh);
        
    }
    
    print "hello\tyo\t \n";
?>


</body>
</html>