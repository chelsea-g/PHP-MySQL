<?php
    
    class Person {
        
        private $name;
        private $email;
        
        public function getName() {
            
            return $this->name;
            
        }
        
        public function getEmail() {
            
            return $this->email;
            
        }
        
        public function setName($name) {
            
            $this->name = $name;
            
        }
        
        public function setEmail($email) {
            
            $this->name = $email;
            
        }        
        
    }

?>