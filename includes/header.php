<?php
    require 'config/config.php';

    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    else{
        header("Location: register.php");
    }

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to social!</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

    <!-- JS -->
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</head>
<body> 

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">Social</a>
        </div>
        <nav class="nav-bar">
            <a class="username-head" href="">
                <?php echo $user['first_name']." ".$user['last_name']; ?>
            </a>
            <a href="index.php  "><i class="fas fa-home"></i></a>
            <a href=""><i class="fas fa-envelope"></i></a>
            <a href=""><i class="fas fa-bell"></i></a>
            <a href=""><i class="fas fa-users"></i></a>
            <a href=""><i class="fas fa-cogs "></i></a>  
            <a href="includes/handlers/logout.php"><i class="fas fa-sign-out "></i></a>  
        </nav>
    </div>
        