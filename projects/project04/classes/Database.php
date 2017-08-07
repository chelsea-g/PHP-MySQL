<?php

    class Database {
        
        const HOST = 'localhost';
        const USER = 'root';
        const PASSWORD = '';
        const DB = 'zazahut';
        
        static private $dbc;
        
        
        //run a query and return it's results
        public static function runQuery($query) {
            
            //connect to the zazahut database
            self::connect();
            
            //run the given query    
            $results = mysqli_query(self::$dbc, $query)
                    or die('<p class="error">Error running query: ' . $query . '</p>');
            
            //disconnect from the db
            self::disconnect();
            
            //return its result set
            return $results;
            
        }
        
        private static function connect() {
            
            //connect to the zazahut database
            self::$dbc = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DB)
                or die('<p class="error">Error connecting to the database.</p>');
            
        }
        
        private static function disconnect() {
            
            //disconnect from the db
            mysqli_close(self::$dbc);
            
        }
        
        //sanitize form inputs
        public static function sanitizeInput($input) {
            
            self::connect();
            
            $clean_input = mysqli_real_escape_string(self::$dbc, trim($input));
            
            self::disconnect();
            
            return $clean_input;
            
        }
        
    }

?>