<?php
    
    require_once("Person.php");

    class Ninja extends Person {
        
        
        function jumpingSpinKick() {
            
            echo "$this->getName() and $this->getEmail() executing a jumping spin kick!"; 
            
            
        }
        
        
    }

?>
