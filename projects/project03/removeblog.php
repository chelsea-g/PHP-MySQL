<?php
    require_once('Blog.php');
    require_once('header.php');
    $id = $_GET['id'];
    
    $delete = new Blog();
    $query = "DELETE FROM blog WHERE id = $id";
    $delete->runQuery($query);
    
    echo '<div id="delete">';
    echo '<br /><p>Entry successfully deleted. <br /><a href="admin.php">Back to Admin</a></p><br />';
    echo '</div>';
    
    require_once('footer.php');
?>