<?php
    
    require_once('startsession.php');
    require_once('Database.php');
    
    class Login {
        
        
        public static function logInNow($username, $password) {
            
             //User lookup query
            $query = "SELECT id, username, first_name, last_name, is_admin FROM employee WHERE username = '$username'"
                    . "AND password = SHA('$password')";
            
            //Run query
            $results = Database::runQuery($query);
            
            //Make sure query returns 1 record (the user's account)
            if (mysqli_num_rows($results) == 1) {
                
                //Set the current users vars
                $row = mysqli_fetch_array($results);
                
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['is_admin'] = $row['is_admin'];
                
                
                //Cookie expires after 30 days (automatically logging them out)
                setcookie('user_id', $row['user_id'], time + (60 * 60 * 24 * 30));
                setcookie('username', $row['username'], time + (60 * 60 * 24 * 30));
                
            }
            
            if(self::isLoggedIn()) {
                    
                //Redirect user after login
                include('redirect.php');
                
            } else {
                
                echo '<p class="error">Unable to log in.</p>';
                
            }
        }
        
        public static function logOutNow() {
            
            //If the user is logged in, delete the session vars to log them out
            if (isset($_SESSION['user_id'])) {
                
                //Delete the session vars by clearing the 4_SESSION array
                $_SESSION = array();
                
                //Delete session cookie by setting its expiration to an hour prior (3600 seconds)
                if (isset($_COOKIE[session_name()])) {
                    
                    setcookie(session_name(), '', time() - 3600);
                    
                }
                
                //Destroy the session
                session_destroy();
                
            }
            
            //Delete the user ID and username cookies by setting their expirations to an hour prior (3600 seconds)
            setcookie('user_id', '', time() - 3600);
            setcookie('username', '', time() - 3600);
            
            if (self::isLoggedIn() == false) {
                
                //Redirect to the homepage
                include 'redirect.php';
                
            } else {
                
                echo '<p class="error">Error logging out.</p>';
                
            }
            
            
        }
        
        public static function isLoggedIn() {
            
            //A user is logged in
            if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
                
                return true;
            
            //There is no user logged in at this moment  
            } else {
                
                return false;
                
            }
        }
        
    }

?>