<?php

    class User {
        
        protected $id;
        protected $username;
        protected $password;
        protected $first_name;
        protected $last_name;
        protected $job_title;
        protected $hire_date;
        protected $is_admin;

        public function __construct($id, $username, $password, $first_name, $last_name, $job_title, $hire_date, $is_admin) {
            
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->job_title = $job_title;
            $this->hire_date = $hire_date;
            $this->is_admin = $is_admin;
            
        }
    
        public function getId() {
            
            return $this->id;
            
        }
        
        public function getUsername() {
            
            return $this->username;
            
        }
        
        public function getPassword() {
            
            return $this->password;
            
        }
        
        public function getFirstName() {
            
            return $this->first_name;
            
        }
        
        public function getLastName() {
            
            return $this->last_name;
            
        }
        
        public function getJobTitle() {
            
            return $this->job_title;
            
        }
        
        public function getHireDate() {
            
            return $this->hire_date;
            
        }
        
        public function getIsAdmin() {
            
            return $this->is_admin;
            
        }
         
    
    }
?>