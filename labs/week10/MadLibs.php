<?php

class MadLibs {
    
    //Properties
    private $noun;
    private $verb;
    private $adjective;
    private $adverb;
    private $story;
    
    
    //Getters and Setters
    public function setNoun($noun) {
        
        $this->noun = $noun;
        
    }
    
    public function getNoun() {
        
        return $this->noun;
        
    }
    
    public function setVerb($verb) {
        
        $this->verb = $verb;
        
    }
    
    public function getVerb() {
        
        return $this->verb;
        
    }
    
    public function setAdjective($adjective) {
        
        $this->adjective = $adjective;
        
    }
    
    public function getAdjective() {
        
        return $this->adjective;
        
    }
    
    public function setAdverb($adverb) {
        
        $this->adverb = $adverb;
        
    }
    
    public function getAdverb() {
        
        return $this->adverb;
        
    }
    
    public function setStory() {
        
        $this->story = 'The ' . $this->adjective . ' ' . $this->noun . ' likes to ' . ' ' . 
                $this->verb . ' ' . $this->adverb . ' at the beach!';
        
    }
    
    public function getStory() {
        
        return $this->story;
        
    }
    
    //Save the madlib's parts of speech into the database
    public function saveWords() {
        
        //Connect to madlib database
        $dbc = mysqli_connect('localhost', 'root', '', 'madlib') 
              or die('<br /><br />ERROR: Could not connect to the database.');
        
        //SQL query variable
        $query = "INSERT INTO word_choices (noun, verb, adjective, adverb, story)" .
                "VALUES ('$this->noun', '$this->verb', '$this->adjective', '$this->adverb', '$this->story')";
        
    
        //Add values to the database using query
        mysqli_query($dbc, $query);
        
        //Close db
        mysqli_close($dbc);

    }
    
    //Returns the storys from newest to oldest
    public function orderStories() {
  
        //SQL query variable
        $query = "SELECT id, story, time_stamp FROM word_choices ORDER BY time_stamp DESC";
        
        //Connect to madlib database
        $dbc = mysqli_connect('localhost', 'root', '', 'madlib') 
              or die('<br /><br />ERROR: Could not connect to the database.');
        
        $data = mysqli_query($dbc, $query);
        
                        
        //Close db
        mysqli_close($dbc);
        
        return $data;
        
    }
    
    //Returns a formatted table of stories newest to oldest
    public function formatStoriesTable() {
        
        $data = $this->orderStories();
        
        echo '<table><tr><td>Date</td><td>Time</td><td>Story</td><td>Delete</td></tr>';
        
        while($row = mysqli_fetch_array($data)) {     
        
            echo '<tr><td>' . substr($row['time_stamp'], 0, 10) . '</td><td>' . substr($row['time_stamp'], 10) . '</td><td>' . $row['story'] . 
            '</td><td><a href="delete.php?id=' . $row['id'] . '"><img src="trash.png" /></a></td></tr>';
            
        }   
        
        echo '</table>';

        
    }
    
}

?>