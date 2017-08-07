<?php
    //All classes to use from Guzzle. Applications usually need all of these.
    require_once 'vendor/autoload.php';
    use GuzzleHttp\Client;
    use GuzzleHttp\Post\PostBody;
    use GuzzleHttp\Stream\StreamInterface;
    use GuzzleHttp\Exception\RequestException;
    
    
    if (isset($_POST['submit']) && isset($_POST['postal_code']) 
            && !empty($_POST['postal_code'])) {
        
        $postal_code = $_POST['postal_code'];
        $api_key = '3f3f56c2337033b8fb44dce3d225fffe';
        $units = 'imperial';
        $url = "api.openweathermap.org/data/2.5/weather?zip=$postal_code,us&units=$units&appid=$api_key";
        
        $client = new Client();
        
        try {
            
            $response = $client->request('GET', $url, []);
            $response_body = $response->getBody();
            $decoded_body = json_decode($response_body);
            
        } catch (RequestException $e) {
            
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($e->getRequest());
            echo "</pre>";
            
            if ($e->hasResponse()) {
            
                echo $e->getResponse();
                
            }
            
        }
        
          
    }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
  
      <title>Weather App - REST Demonstration</title>
  
  </head>
  <body>
      <!-- Page Content -->
        <h1>Weather by zip code</h1>
          <p>Please fill out the form to get weather info!</p>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" role="form">
          <fieldset>
            <legend>Weather For <?= $decoded_body->name ?></legend>
            <label for="postal_code">Postal Code:</label>
            <input type="text" name="postal_code" id="postal_code">
            <button type="submit" name="submit" value="submit">Submit</button>
          </fieldset>
        </form>
 
        <?php if($decoded_body): ?>
          <!--
          stdClass Object ( [coord] => stdClass Object ( [lon] => -89.02 [lat] => 43 ) 
                          [weather] => Array ( 
                              [0] => stdClass Object ( [id] => 803 
                                                      [main] => Clouds 
                                                      [description] => broken clouds 
                                                      [icon] => 04n ) ) 
                          [base] => cmc stations 
                          [main] => stdClass Object ( [temp] => 273.838 
                                                      [pressure] => 998.15 
                                                      [humidity] => 89 
                                                      [temp_min] => 273.838 
                                                      [temp_max] => 273.838 
                                                      [sea_level] => 1034.35 
                                                      [grnd_level] => 998.15 ) 
                          [wind] => stdClass Object ( [speed] => 4.12 
                                                      [deg] => 303.001 ) 
                          [clouds] => stdClass Object ( [all] => 56 ) 
                          [dt] => 1448328154 
                          [sys] => stdClass Object ( [message] => 0.003 
                                                      [country] => US 
                                                      [sunrise] => 1448369964 
                                                      [sunset] => 1448403946 ) 
                          [id] => 5247533 
                          [name] => Cambridge 
                          [cod] => 200 )
                -->
                
              Current Temperature: <?= $decoded_body->main->temp ?> <br />
              Current Humdity: <?= $decoded_body->main->humidity ?>% <br />
              Minimum Temperature: <?= $decoded_body->main->temp_min ?> <br />
              Maximum Temperature: <?= $decoded_body->main->temp_max ?> <br />
                
        <?php endif ?>
          
  </body>
</html>



