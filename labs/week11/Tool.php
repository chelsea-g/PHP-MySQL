<?php 

    require_once('Product.php');
    
    class Tool extends Product {
        
        //Declare properties
        protected $shipper; //UPS, FedEx, or USPS
        protected $weight;

        
        //Override the addProduct method for Tool type
        public function addProduct() {
            
            $query = "INSERT INTO products (title, description, price, shipper, weight) " 
                    . "VALUES ('$this->name', '$this->description', '$this->price', '$this->shipper', '$this->weight')";
            
            $this->runProductsQuery($query);
            
        }
        
        
        //Getters, Setters
        public function setShipper($shipper) {
            
            $this->shipper = $shipper;
            
        }
        
        public function getShipper() {
            
            return $this->shipper;
            
        }
        
        public function setWeight($weight) {
            
            $this->weight = $weight;
            
        }
        
        public function getWeight() {
            
            return $this->weight;
            
        }
        
    }

?>