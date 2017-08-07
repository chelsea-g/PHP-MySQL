<?php 

  //User name and password variables
  $username = 'john';
  $password = 'cena';
  
  //Verify username and password
  if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
          ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
              
              //The user name/password are incorrect, send the authentication headers
              header('HTTP/1.1 401 Unathorized');
              header('WWW-Authenticate: Basic realm="Guitar Wars"');
              exit('<h2>Guitar Wars<h2>You must enter a valid username/password to access this page. <h1>ACCESS DENIED<h1>');
              
          }
          
?>