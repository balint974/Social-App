<?php 

include("../../config/config.php");
include("../classes/Users.php");
include("../classes/Post.php");

$limit = 10; // Number of loaded posts

$posts = new Post($con,$_REQUEST['userLoggedIn']);
$posts->loadPostsFriends($_REQUEST,$limit);


?>