<?php
    
    //Start the session
    require_once('startsession.php');
    
    //Insert page header
    $page_title = 'Edit Profile';
    require_once('header.php');
    
    //Implement scripts
    require_once('appvars.php');
    require_once('connectvars.php');
    
    //Display nav menu
    require_once('navmenu.php');
    
    //Make sure the user is logged in
    include('verifylogin.php');

  
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


    if (isset($_POST['submit'])) {
    
        // Grab the profile data from the POST
        $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
        $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
        $sex = mysqli_real_escape_string($dbc, trim($_POST['sex']));
        $birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
        $weight = mysqli_real_escape_string($dbc, trim($_POST['weight']));
        $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
        $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
        $new_picture_type = $_FILES['new_picture']['type'];
        $new_picture_size = $_FILES['new_picture']['size']; 
        
        if (!empty($new_picture)) {
            list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
        }
    
        $error = false;
    
        // Validate and move the uploaded picture file, if necessary
        if (!empty($new_picture)) {
          
            if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') ||
                ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
                ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
                  
                if ($_FILES['file']['error'] == 0) {
                  
                    // Move the file to the target upload folder
                    $target = MM_UPLOADPATH . basename($new_picture);
                    
                    if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                        
                        // The new picture file move was successful, now make sure any old picture is deleted
                        if (!empty($old_picture) && ($old_picture != $new_picture)) {
                            
                          @unlink(MM_UPLOADPATH . $old_picture);
                          
                        }
                    
                    } else {
                        // The new picture file move failed, so delete the temporary file and set the error flag
                        @unlink($_FILES['new_picture']['tmp_name']);
                        $error = true;
                        echo '<p class="error">Sorry, there was a problem uploading your picture.</p>';
                    }
                      
                }
                
            } else {
                
                // The new picture file is not valid, so delete the temporary file and set the error flag
                @unlink($_FILES['new_picture']['tmp_name']);
                $error = true;
                echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                        ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
            }
          
        }
    

        // Update the profile data in the database
        if (!$error) {
          
            if (!empty($first_name) && !empty($last_name) && !empty($sex) && !empty($birthdate) && !empty($weight)) {
                
                // Only set the picture column if there is a new picture
                if (!empty($new_picture)) {
                    
                  $query = "UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name', sex = '$sex', " .
                    " birthdate = '$birthdate', weight = '$weight', picture = '$new_picture' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                    
                } else {
                    
                      $query = "UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name', sex = '$sex', " .
                        " birthdate = '$birthdate', weight = '$weight' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                
                }
            
                mysqli_query($dbc, $query);
                
                // Confirm success with the user
                echo '<p>Your profile has been successfully updated. Would you like to <a href="index.php">view your profile</a>?</p>';
                
                mysqli_close($dbc);
                exit();
            
            } else {
            
                echo '<p class="error">You must enter all of the profile data (the picture is optional).</p>';
            
            }
          
        }
    
    // End of check for form submission
    } else {
    
        // Grab the profile data from the database
        $query = "SELECT first_name, last_name, sex, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);
    
        if ($row != NULL) {
          
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $sex = $row['sex'];
            $birthdate = $row['birthdate'];
            $weight = $row['weight'];
            $old_picture = $row['picture'];
      
        } else {
          
            echo '<p class="error">There was a problem accessing your profile.</p>';
      
        }
    
    }

    mysqli_close($dbc);
    
?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    
    <fieldset>
      
      <legend>Personal Information</legend>
      
      <label for="firstname">First name</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />
      
      <label for="lastname">Last name</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />
      
      <label for="sex">Sex</label>
      <select id="sex" name="sex">
        <option value="M" <?php if (!empty($sex) && $sex == 'M') echo 'selected = "selected"'; ?>>Male</option>
        <option value="F" <?php if (!empty($sex) && $sex == 'F') echo 'selected = "selected"'; ?>>Female</option>
      </select><br />
      
      <label for="birthdate">Birthdate</label>
      <input type="date" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; ?>" /><br />

      <label for="weight">Weight</label>
      <input type="number" name="weight" min="75" max="999" value="<?php if (!empty($weight)) echo $weight; ?>" /><br />
     
      <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>" />
      
      <label for="new_picture">Picture</label>
      <input type="file" id="new_picture" name="new_picture" />
      
      <?php if (!empty($old_picture)) {
          
          echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
          
      } ?>
      
        <br />
        <input type="submit" value="Save Profile" name="submit" />
        
    </fieldset>

  </form>
  
<?php

    require_once('footer.php'); 
    
?>

