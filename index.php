<?php 
    include('includes/header.php'); 
    include('includes/classes/Users.php');
    include('includes/classes/Post.php');
    // session_destroy();

    $user_obj = new User($con, $userLoggedIn);

    if(isset($_POST['post'])){
        $post = new Post($con,$userLoggedIn);
        $post->submitPost($_POST['post_text'],'none');
    }

    
?>

<div class="container user_index">
    <div class="row gx-2 u-row">
        <div class="column user-info-col col-3">
            <div class="user_details">
            <a href="<?php echo $userLoggedIn; ?>"><img class="user-image" src="<?php echo $user['profile_pic'] ?>"></a>
            <div class="us_det">
                <a class="bold" href="<?php echo $userLoggedIn; ?>"><?php echo $user_obj->GetUserFirstAndLastName(); ?></a>
                <h6>Posts: <?php echo $user['num_posts'] ?></h6>
                <h6>Likes: <?php echo $user['num_likes'] ?></h6>
            </div>
            </div>
        </div>
        <div class="column col ">
            <form class="post_form" action="index.php" method="POST">
                <textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
                <input type="submit" name="post" id="post_button" value="Post"> 
            </form>
        </div> 
    </div>
   
</div>


</body>
</html>