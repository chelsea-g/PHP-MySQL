<?php

    require_once('Product.php');

    class Electronic extends Product {
        
        //Declare properties
        protected $isRecyclable; //True or False
        
        
        //Override the addProduct method for Electronic type
        public function addProduct() {
            
            $query = "INSERT INTO products (title, description, price, isRecyclable) " 
                    . "VALUES ('$this->name', '$this->description', '$this->price', '$this->isRecyclable')";
            
            $this->runProductsQuery($query);
            
        }
        
        
        //Getters, Setters
        public function setIsRecyclable($isRecyclable) {
            
            $this->isRecyclable = $isRecyclable;
            
        }
        
        public function getIsRecyclable() {
            
            return $this->isRecyclable;
            
        }
        
    }

?>