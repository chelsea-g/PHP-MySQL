<?php

    session_start();
    
    //Captcha constants
    define('CAPTCHA_NUMCHARS', 6); //number of chars in pass-phrase
    define('CAPTCHA_WIDTH', 100);  //width of image
    define('CAPTCHA_HEIGHT', 25);  //height of image
    
    
    //Generate random pass-phrase
    $pass_phrase = "";
    
    for ($i = 0; $i < CAPTCHA_NUMCHARS; $i++) {
        
        $pass_phrase .= chr(rand(97, 122));
        
    }
    
    
    //Store encrypted pass-phrase in a session variable
    $_SESSION['pass_phrase'] = sha1($pass_phrase);
    
    
    //Create the image
    $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
    
    //Set white background with black text and grey graphics
    $bg_color = imagecolorallocate($img, 255, 255, 255);   //white
    $text_color = imagecolorallocate($img, 0, 0, 0);       //black
    $graphic_color = imagecolorallocate($img, 64, 64, 64); //grey
    
    
    //Fill background by covering with rectangle
    imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);
    
    
    //Draw random lines
    for ($i = 0; $i < 5; $i++) {
        
        imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
        
    }
    
    
    //Draw random dots
    for ($i = 0; $i < 50; $i++) {
        
        imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
        
    }
    
    
    //Draw pass-phrase string
    imagettftext($img, 18, 0, 5, CAPTCHA_HEIGHT - 5, $text_color, "./Courier New Bold.ttf", $pass_phrase);
    
    
    //Output image as PNG using header
    header("Content-type: image/png");
    imagepng($img);
    
    
    //Clean up
    imagedestroy($img); 
    
 
?>