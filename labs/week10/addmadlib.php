<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Madlib Generator</title> 
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h1>Madlib Generator</h1>

<?php 

    require_once('MadLibs.php');
    
    //Create a new instance of MadLibs class
    $madlib = new MadLibs();
    
    $adjective = $_POST['adjective'];
    $adverb = $_POST['adverb'];
    $noun = $_POST['noun'];
    $verb = $_POST['verb'];
    
    if (isset($_POST['submit'])) {
        
        if (!empty($_POST['adjective']) && !empty($_POST['adverb']) 
                && !empty($_POST['noun']) && !empty($_POST['verb'])) {
            //set the MadLibs variables
            $madlib->setAdjective($adjective);
            $madlib->setAdverb($adverb);
            $madlib->setNoun($noun);
            $madlib->setVerb($verb);
            $madlib->setStory();
            $madlib->saveWords();
                    
        } else {
            
            echo "Please input all fields!";
            
        }
        
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    <h3>Enter a word for each part of speech to make your own madlib!</h3>
       
        <label for="noun">Enter a noun: </label>
        <input type="text" id="noun" name="noun" value="<?php if(!empty($noun)) echo $noun ?>"/>
        <br />
        
        <label for="verb">Enter a verb: </label>
        <input type="text" id="verb" name="verb" value="<?php if(!empty($verb)) echo $verb ?>"/>
        <br />
        
        <label for="adjective">Enter an adjective: </label>
        <input type="text" id="adjective" name="adjective" value="<?php if(!empty($adjective)) echo $adjective ?>"/>
        <br />
        
        <label for="adverb">Enter an adverb: </label>
        <input type="text" id="adverb" name="adverb" value="<?php if(!empty($adverb)) echo $adverb ?>"/>
        <br /><br />
        
        <input type="submit" name="submit" value="Create Madlib!">
    
</form>

<?php 

    echo $madlib->formatStoriesTable(); 
    
?>