<?php
    
    require_once("Blog.php");
    
    class BlogPost extends Blog {
        
        //Declare properties
        protected $title;
        protected $post;
        
        //Add a new post to the blog db
        function newPost($title, $post) {
            
            //Hold the blog post info
            $this->setTitle($title);
            $this->setPost($post);
            
            //Add the post to the db
            $query = "INSERT INTO blog (title, date, post)"
                    . " VALUES ('$this->title', NOW(), '$this->post')";
            
            $this->runQuery($query);
            
            
        }
        
        //Getters Setters
        function setTitle($title) {
            
            $this->title = $title;
            
        }
        
        function getTitle() {
            
            return $this->title;
            
        }
        
        function setPost($post) {
            
            $this->post = $post;
            
        }
        
        function getPost() {
            
            return $this->post;
        }
        
    }

?>