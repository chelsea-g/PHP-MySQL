<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Madlib Generator</title> 
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h1>Madlib Generator</h1>
  <?php
    
    //Executes upon form submission.
    if(isset($_POST['submit'])) {
        
      //Form variables
      $noun = $_POST['noun'];
      $verb = $_POST['verb'];
      $adjective = $_POST['adjective'];
      $adverb = $_POST['adverb'];
      $story = 'The ' . $adjective . ' ' . $noun . ' likes to ' . ' ' . $verb . ' ' . $adverb . ' at the beach!';
      
      //Boolean flag for form output
      $output_form = false;
          
      //Insert word values into database if all fields hold values
      if(!empty($noun) && !empty($verb) && !empty($adjective) && !empty($adverb)) {
          
          //Connect to madlib database
          $dbc = mysqli_connect('localhost', 'root', '', 'madlib') 
                  or die('<br /><br />ERROR: Could not connect to the database.');
          
          //SQL query variable
          $query = "INSERT INTO word_choices (noun, verb, adjective, adverb, story)
                  VALUES ('$noun', '$verb', '$adjective', '$adverb', '$story')";
          
          //Add values to the database using query
          mysqli_query($dbc, $query);
          
          //Confirm madlib creation
          ?>
          
          <h3>Thanks for playing! Here's your Madlib:</h3>
          
          <p><?php echo $story ?></p>
          
          <!-- Offer button to create another madlib (resets and shows form) -->
          <form>
            <input type="submit" name="submit" value="Make another!"/>
            <br />
          </form>
          
          <?php 
          
          //Close the madlib database
          mysqli_close($dbc);
          
      } else {
          
          //Output message if some fields are empty
          ?>
          
          <p> Please fill out all word fields to create your story! </p>
          
          <?php
          
          $output_form = true;
      }
      
    } else {
        //Show the form on the first load of the page
        $output_form = true;
    }
    
    if($output_form) { ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h3>Enter a word for each part of speech to make your own madlib!</h3>
        
        <!-- Sticky fields for all inputs -->
        <label for="noun">Enter a noun: </label>
        <input type="text" id="noun" name="noun" value="<?php if(!empty($noun)) echo $noun; ?>"/>
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
        
    }

//Always output recently created madlibs at bottom of page.
include 'viewmadlibs.php';

?>

</body>
</html>