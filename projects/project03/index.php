<?php
    require_once("header.php");
    require_once("connectvars.php");
    require_once('Blog.php');
    require_once('BlogPost.php');
?>

<h1>Welcome to Blaahgy</h1>
<h3>- Blaahg your heart out -</h3>
<div id="form">
<hr>


<?php
    
    $blog = new Blog();
    $blog_post;
    $title = $_POST['title'];
    $post = $_POST['post'];
    
    //Create a new blog post if submission is valid
    if (!empty($_POST['submit'])) {
            
        if (!empty($post)) {
            
            if ((empty($blog_post))) {
                
                $blog_post = new BlogPost();
                $blog_post->newPost($title, $post);
            
            }
            
        } else {
            
            echo '<p>Please make sure you have entered the title and body of your post.</p>';
            
        }
        
    }
    
    //Output the blog post form
    $blog->showNewPostForm();
    echo '<hr>';
    echo '</div>';
    
    //Output the last 15 blogs
    $blog->showRecentBlogs();
    
    echo '</div>';
    require_once("footer.php");
    
    //Link to the admin page
    echo '<small><a href="admin.php">Staff</a></small>';

?>