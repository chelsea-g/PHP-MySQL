{"changed":true,"filter":false,"title":"index.php","tooltip":"/projects/project01/index.php","value":"<html>\n<head>\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n  <title>Madlib Generator</title> \n  <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />\n</head>\n<body>\n    <h1>Madlib Generator</h1>\n<?php\n    if(isset($_POST['submit'])) {\n        \n        $noun = $_POST['noun'];\n        $verb = $_POST['verb'];\n        $adjective = $_POST['adjective'];\n        $adverb = $_POST['adverb'];\n        $story = 'The ' . $adjective . ' ' . $noun . 'likes to ' . $verb . ' ' . $adverb . ' at the beach!';\n            \n            \n        //Insert word values into database if all fields hold values\n        if(!empty($noun) && !empty($verb) && !empty($adjective) && !empty($adverb)) {\n                \n            //Connect to madlib database\n            $dbc = mysqli_connect('localhost', 'root', '', 'madlib') \n                    or die('Error connecting to the database.');\n            \n            //SQL query variable\n            $query = \"INSERT INTO madlib VALUES ('$noun', '$verb', '$adjective', '$adverb', '$story')\";\n            \n            //Add values to the database\n            mysqli_query($dbc, $query);\n            \n            \n            //Confirm madlib creation\n            ?>\n            \n            <p>\n                Thanks for playing! Here's your Madlib: \n            </p>\n                \n            <h2>Look what other Madlib user's have created!</h2>\n\n            <?php\n            \n            //Close the madlib database\n            mysqli_close($dbc);\n            \n            \n        } else {\n            \n            ?>\n            <p> Please fill out all word fields to create your story! </p>\n            <?php\n            \n        }\n        \n    }\n?>\n\n</body>","undoManager":{"mark":-2,"position":2,"stack":[[{"start":{"row":0,"column":0},"end":{"row":80,"column":7},"action":"insert","lines":["<html>","<head>","  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />","  <title>Madlib Generator</title> ","  <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />","</head>","<body>","    <h1>Madlib Generator</h1>","<?php","    if(isset($_POST['submit'])) {","        ","        $noun = $_POST['noun'];","        $verb = $_POST['verb'];","        $adjective = $_POST['adjective'];","        $adverb = $_POST['adverb'];","        $story = 'The ' . $adjective . ' ' . $noun . 'likes to ' . $verb . ' ' . $adverb . ' at the beach!';","            ","            ","        //Insert word values into database if all fields hold values","        if(!empty($noun) && !empty($verb) && !empty($adjective) && !empty($adverb)) {","                ","            //Connect to madlib database","            $dbc = mysqli_connect('localhost', 'root', '', 'madlib') ","                    or die('Error connecting to the database.');","            ","            //SQL query variable","            $query = \"INSERT INTO madlib VALUES ('$noun', '$verb', '$adjective', '$adverb', '$story')\";","            ","            //Add values to the database","            mysqli_query($dbc, $query);","            ","            ","            //Confirm madlib creation","            ?>","            ","            <p>","                Thanks for playing! Here's your Madlib: ","            </p>","                ","            <h2>Look what other Madlib user's have created!</h2>","","            <?php","            ","            //Close the madlib database","            mysqli_close($dbc);","            ","            ","        } else {","            ","            ?>","            <p> Please fill out all word fields to create your story! </p>","            <?php","            ","        }","        ","    }","?>","    <form method=\"post\" action=\"<?php echo $_SERVER['PHP_SELF']; ?>\">","        ","        <!-- Sticky fields for all inputs -->","        <label for=\"noun\">Enter a noun: </label>","        <input type=\"text\" id=\"noun\" name=\"noun\" value=\"<?php if(!empty($noun)) echo $noun; ?>\">","        <br />","        ","        <label for=\"verb\">Enter a verb: </label>","        <input type=\"text\" id=\"verb\" name=\"verb\" value=\"<?php if(!empty($verb)) echo $verb ?>\">","        <br />","        ","        <label for=\"adjective\">Enter an adjective: </label>","        <input type=\"text\" id=\"adjective\" name=\"adjective\" value=\"<?php if(!empty($adjective)) echo $adjective ?>\">","        <br />","        ","        <label for=\"adverb\">Enter an adverb: </label>","        <input type=\"text\" id=\"adverb\" name=\"adverb\" value=\"<?php if(!empty($adverb)) echo $adverb ?>\">","        <br />","        ","        <input type=\"submit\" name=\"submit\" value=\"Create Madlib!\">","        ","    </form>    ","","</body>"],"id":1}],[{"start":{"row":57,"column":0},"end":{"row":78,"column":15},"action":"remove","lines":["    <form method=\"post\" action=\"<?php echo $_SERVER['PHP_SELF']; ?>\">","        ","        <!-- Sticky fields for all inputs -->","        <label for=\"noun\">Enter a noun: </label>","        <input type=\"text\" id=\"noun\" name=\"noun\" value=\"<?php if(!empty($noun)) echo $noun; ?>\">","        <br />","        ","        <label for=\"verb\">Enter a verb: </label>","        <input type=\"text\" id=\"verb\" name=\"verb\" value=\"<?php if(!empty($verb)) echo $verb ?>\">","        <br />","        ","        <label for=\"adjective\">Enter an adjective: </label>","        <input type=\"text\" id=\"adjective\" name=\"adjective\" value=\"<?php if(!empty($adjective)) echo $adjective ?>\">","        <br />","        ","        <label for=\"adverb\">Enter an adverb: </label>","        <input type=\"text\" id=\"adverb\" name=\"adverb\" value=\"<?php if(!empty($adverb)) echo $adverb ?>\">","        <br />","        ","        <input type=\"submit\" name=\"submit\" value=\"Create Madlib!\">","        ","    </form>    "],"id":2}],[{"start":{"row":56,"column":2},"end":{"row":57,"column":0},"action":"remove","lines":["",""],"id":3}]]},"ace":{"folds":[],"scrolltop":45,"scrollleft":0,"selection":{"start":{"row":39,"column":64},"end":{"row":39,"column":64},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":2,"state":"start","mode":"ace/mode/php"}},"timestamp":1455823386205}