<?php
    
    class Student {
        
        private $id;
        private $name;
        private $email;
        
        public function __get($ivar) {
            
            return $this-$ivar;
            
        }
        
        public function __set($ivar) {
            
            $this->$ivar = $value;
            
        }
        
        
        public function __toString() {
            
            $format = "<hr/>Id: %s<br/>Name: %s<br/>Email: %s<br/>Created: %s</hr>";
            
            return sprintf($format, $this->__get("id"), $this->__get("name"), 
                    $this->__get("email"));
            
        }
        
    }

?>