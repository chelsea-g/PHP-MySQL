{"filter":false,"title":"hello.php","tooltip":"/week01/hello.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":15,"column":7},"action":"insert","lines":["  ","<html>"," <head>","  <title>Personalized Hello World</title>"," </head>"," <body>","  <?php","      if(!empty($_POST['name'])) {","          echo \"Greetings, {$_POST['name']}, and welcome.\";","      }","  ?>","  <form action=\"<?php $PHP_SELF; ?>\" method=\"post\">","  Enter your name: <input type=\"text\" name=\"name\" />","  <input type=\"submit\" />"," </body>","</html>"],"id":1}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":15,"column":7},"end":{"row":15,"column":7},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1453239511249,"hash":"fd4fde5e39b3ef11aeba0fe5f0a32d0136808667"}