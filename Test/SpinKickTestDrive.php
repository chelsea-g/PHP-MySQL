<?php
    require_once("Ninja.php");
    require_once("Person.php");
    
    $ninjaGuy = new Ninja();
    
    $ninjaGuy->setName('Dude Dudeson');
    $ninjaGuy->setEmail('mandude@gmail.com');
    
    $ninjaGuy->jumpingSpinKick();
    

?>