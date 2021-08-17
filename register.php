<?php

    require 'config/config.php';
    require 'includes/form_handlers/register_handler.php';
    require 'includes/form_handlers/login_handler.php';

?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/register_style.css">
    <script   src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    
    <script type="text/javascript">var errors = '<?php $error_array?>';</script>
    <script type="text/javascript" src="Assets/script/register-script.js"></script> 
    
</head>
<body>


    <div class="wrapper">
        <div class="form-wrap">
        <div class="tab">
        <button id="tablinks-log" class="tablinks active" onclick="openLoginAndRegisterForm(event, 'Login')">Log In</button>
        <button id="tablinks-reg" class="tablinks" onclick="openLoginAndRegisterForm(event, 'Register')">Register</button>
        </div>



         <div id="Login" class="tabcontent">
         <form action="register.php" method="POST">
                <input type="email" name="log_email" placeholder="Email address" value="<?php 
                if(isset($_SESSION['log_email'])){
                    echo $_SESSION['log_email'];
                }
                ?>" 
                required>
                <br>
                <input type="password" name="log_password" placeholder="Password">
                <br>
                <input type="submit" name = "login_button" value ="Login">
                <br>

                <?php if(in_array("Email or password was incorrect!",$error_array))echo "<h5 class='form-error'>Email or password was incorrect!</h5>";?>
            </form>
         </div>
            
        <div id="Register" class="tabcontent">
        <form action = "register.php" method="POST">

            <input type = "text" name="reg_fname" placeholder="First Name" value="<?php 
            if(isset($_SESSION['reg_fname'])){
                echo $_SESSION['reg_fname'];
            }
            ?>" 
            required>
            <br>
            <?php if(in_array("Your first name must be between 2 and 25 characters<br>",$error_array))echo "<h5 class='form-error'>Your first name must be between 2 and 25 characters</h5>";?>

            <input type = "text" name="reg_lname" placeholder="Last Name" value="<?php 
            if(isset($_SESSION['reg_lname'])){
                echo $_SESSION['reg_lname'];
            }
            ?>"
            required>
            <br>
            <?php if(in_array("Your last name must be between 2 and 25 characters<br>",$error_array))echo "<h5 class='form-error'>Your last name must be between 2 and 25 characters</h5>";?>

            <input type = "email" name="reg_email" placeholder="Email" value="<?php 
            if(isset($_SESSION['reg_email'])){
                echo $_SESSION['reg_email'];
            }
            ?> "
            required>
            <br>

            <input type = "email" name="reg_email2" placeholder="Confirm Email" value="<?php 
            if(isset($_SESSION['reg_email2'])){
                echo $_SESSION['reg_email2'];
            }
            ?> "
            required>
            <br>
            <?php if(in_array("Email already exists<br>",$error_array))echo "<h5 class='form-error'>Email already exists</h5>";
            else if(in_array("Emails don't match!<br>",$error_array))echo "<h5 class='form-error'>Emails don't match</h5>";
            else if(in_array("Invalid email format<br>",$error_array))echo "<h5 class='form-error'>Invalid email format</h5>";?>

            <input type = "password" name="reg_password" placeholder="Password" required>
            <br>

            <input type = "password" name="reg_password2" placeholder="Confirm Password" required>
            <br>
            <?php if(in_array("Your passwords do not match!<br>",$error_array))echo "<h5 class='form-error'>Your passwords do not match</h5>";
            else if(in_array("Your password can only contain english characters or numbers<br>",$error_array))echo "<h5 class='form-error'>Your password can only contain english characters or numbers</h5>";
            else if(in_array("Your password must be between 5 and 30 characters<br>",$error_array))echo "<h5 class='form-error'>Your password must be between 5 and 30 characters</h5>";?>
            <input type="submit" name = "register_button" value ="Register">
            <br>

            <?php if(in_array("<span style='color:green'>You're all set! Goahead and login!</span>",$error_array))echo "<span style='color:green'>You're all set! Goahead and login!</span>";?>

            </form>    
        </div>
        </div>

            
     </div>


</body>
</html>