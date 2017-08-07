<?php

    class Product {
        
        //Declare properties
        public $name;
        public $description;
        public $price;
        
        
        //Method connects to the products db, runs a specified query, then closes the db
        public function runProductsQuery($query) {
            
            $dbc = mysqli_connect('localhost', 'root', '', 'productsdb');
            $results = mysqli_query($dbc, $query);
            mysqli_close($dbc);
            
            return $results;
            
        }
        
        
        //Add product to the database
        public function addProduct() {
            
            $query = "INSERT INTO products (title, description, price) " 
                    . "VALUES ('$this->name', '$this->description', '$this->price')";
            
            $this->runProductsQuery($query);
            
        }
        
        
        
        //Getters, Setters
        public function setName($name) {
            
            $this->name = $name;
            
        }
        
        public function getName() {
            
            return $this->name;
            
        }
        
        public function setDescription($description) {
            
            $this->description = $description;
            
        }
        
        public function getDescription() {
            
            return $this->description;
            
        }
        
        public function setPrice($price) {
            
            $this->price = $price;
            
        }
        
        public function getPrice() {
            
            return $this->price;
            
        }
        
    }

?>