<?php
    
    class Blog {
        
        //Form for creating a new blog post
        function showNewPostForm() {
            
            ?>
            <form roll="form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
              
              <div class="form-group">
                <label for="title">Subject</label>
                <input type="text" name="title" value="<?= $blog_post->title ?>" />
                <br />
                <br />
                <label for="body">Body</label>
                <br />
                <textarea name="post" rows="10" cols="100" ></textarea>
                <br />
                <br />
              
              <input type="submit" name="submit" />
              </div>
            
            </form>
            <?php
            
        }
        
        
        //Outputs most recent 15 blogs
        function showRecentBlogs() {
            
            $query = "SELECT title, date, post FROM blog ORDER BY date DESC";
            $result = $this->runQuery($query);
            
            if (mysqli_num_rows($result) > 0) {
                
                $count = 1;
                echo '<table>';
                
                while (($row = mysqli_fetch_array($result)) && ($count <= 15)) {
                     
                    $count++;
                    echo '<tr><h2>' . $row['title'] . '<h4><br />' . date("l, M d, Y h:ia", strtotime($row['date'])) 
                            . '</h4></h2><br /> ' . $row['post'] . '</tr>';
                    
                }
            
                echo '</table>';
            }
            
        }
        
        //Used for the admin page, outputs abbreviated blogs and a remove button
        function showAdminOptions() {
            
            echo '<h3>Use this list to remove innappropriate blogs. </h3><hr><div id="admin">';
            
            $query = "SELECT id, title, date, post FROM blog ORDER BY date DESC";
            $result = $this->runQuery($query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo '<table>';
                
                while ($row = mysqli_fetch_array($result)) {
                     
                    echo '<tr><td>' . $row['title'] . '</td><td>'. date("D M d, Y h:i A", strtotime($row['date']))
                            . '</td><td>' . substr($row['post'], 0 , 140) . '... </td>'
                            . '<td><a href="removeblog.php?id=' . $row['id'] . '">Remove</a></td></tr>';
                    
                }
            
                echo '</table>';
            
            }
            
            echo '</div>';
            
        }
        
        //Run application's queries efficiently
        function runQuery($query) {
            
            include_once("connectvars.php");
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            
            $results = mysqli_query($dbc, $query);
            
            mysqli_close($dbc);
            
            return $results;
            
        }
        
        
    }

?>