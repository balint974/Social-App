<?php
    require 'config/config.php';

    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
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
    <title>Social</title>
</head>
<body> 