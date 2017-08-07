<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Aliens Abducted Me - Report an Abduction</h2>
<?php
    $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
    $when_it_happened = $_POST['whenItHappened'];
    $how_long = $_POST['howLong'];
    $how_many =$_POST['howMany'];
    $alien_description = $_POST['alienDescription'];
    $what_they_did = $_POST['whatTheyDid'];
    $fang_spotted = $_POST['fangSpotted'];
    $other = $_POST['other'];
    $email = $_POST['email'];
    $to = 'GREGER@madisoncollege.edu';
    $subject = 'Aliens Abducted Me - Abduction Report';
    $message = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
      "Number of aliens: $how_many\n" .
      "Alien description: $alien_description\n" .
      "Whate they did: $what_they_did\n" .
      "Fang spotted: $fang_spotted\n" .
      "Other comments: $other";
    mail($to, $subject, $message, 'From: ' . $email);
    
    echo 'Thanks for submitting the form.<br />';
    echo 'You were abducted ' . $when_it_happened;
    echo ' and were gone for ' . $how_long . '<br />';
    echo 'Number of aliens: ' . $how_many . '<br />';
    echo 'Describe them: ' . $alien_description . '<br />';
    echo 'The aliens did this: ' . $what_they_did . '<br />';
    echo 'Was Fang there? ' . $fang_spotted . '<br />';
    echo 'Other comments: ' . $other . '<br />';
    echo 'Your email address is ' . $email;
?>
</body>
</html>