<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Add Your High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Guitar Wars - Add Your High Score</h2>

<?php
    
    //include variable script files
    require_once('appvars.php');
    require_once('connectvars.php');
    
    
    if (isset($_POST['submit'])) {
      
        // Grab the score data from the POST
        $name = $_POST['name'];
        $score = $_POST['score'];
        
        
        // Store the uploaded file's details into variable
        $screenshot = $_FILES['screenshot']['name'];
        $screenshot_type = $_FILES['screenshot']['type'];
        $screenshot_size = $_FILES['screenshot']['size'];
        
        //Upload the high score if all fields are filled
        if (!empty($name) && !empty($score) && !empty($screenshot)) {
          
            //type and size file validation
            if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') ||
                ($screenshot_type = 'image/pjpeg') || ($screenshot_type == 'image/png')) &&
                ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
                    
                    
                if ($_FILES['screenshot']['error'] == 0) {
                    //Move the image to the target upload folder
                    $target = GW_UPLOADPATH . $screenshot;
                    if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
                        
                        // Connect to the database
                        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                        
                        // Write the data to the database
                        $query = "INSERT INTO guitarwars VALUES (0, NOW(), '$name', '$score', '$screenshot')";
                        mysqli_query($dbc, $query);
                        
                        // Confirm success with the user
                        ?>
                            <p>Thanks for adding your new high score!</p>
                            <p><strong>Name:</strong> <?php echo $name?><br />
                            <strong>Score:</strong> <?php echo $score ?></p>
                            <img src="<?php echo GW_UPLOADPATH . $screenshot ?>" alt="Score image" /></p>
                            <p><a href="index.php">&lt;&lt; Back to high scores</a></p>
                        <?php 
                        
                        // Clear the score data to clear the form
                        $name = "";
                        $score = "";
                        
                        mysqli_close($dbc);

                    } else {
                        echo '<p class="error"> Sorry, there was a problem uploading your screen shot image.</p>';
                    }
                }         
            } else {
                echo '<p class"error"> The screen shot must be a GIF, JPEG, or PNG image file no ' . 
                'greater than ' . (GW_MAXFILESIZE / 1024) . 'KB in size.</p>';
            }
            
            //Try to delete the temp screen shot image file
            @unlink($_FILES['screenshot']['tmp_name']);
            
        } else {
            echo '<p class="error">Please enter all of the information to add your high score.</p>';
            
        }
    }
    
?>

  <hr />
  <!-- Encoding type must be of multipart/form-data for the file upload field.
       This is a self refferencing form -->
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    
    <!-- Hidden input to set the maximum upload size to 32KB -->
    <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
    
    <!-- Name field -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" />
    <br />
    
    <!-- Score field -->   
    <label for="score">Score:</label>
    <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" />
    <br />
    
    <!-- Screen Shot upload field, show only images in the file browser -->
    <label for="screenshot">Screen Shot:</label>
    <input type="file" id="screenshot" name="screenshot" accept="image/*"/>
    <hr />
    
    <!-- Submit button -->
    <input type="submit" value="Add" name="submit" />
    
    
  </form>
  
</body> 
</html>
