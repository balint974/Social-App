<?php
//Declaring variables to prevent errors

    $fname = ""; //first name
    $lname = ""; //last name
    $em = ""; //email
    $em2 = ""; //email2
    $password = ""; //password
    $password2 = ""; //password2
    $date =""; //sign up date
    $error_array = array(); //Holds error messages

    if(isset($_POST['register_button'])){
        //Registration form values

        //First name
        $fname = strip_tags($_POST['reg_fname']); //remove html tags
        $fname = str_replace(' ','',$fname); //remove spaces
        $fname = ucfirst(strtolower($fname)); //make first letter uppercase 
        $_SESSION['reg_fname'] = $fname; // Stores first name into session variable

        //Last name
        $lname = strip_tags($_POST['reg_lname']); //remove html tags
        $lname = str_replace(' ','',$lname); //remove spaces
        $lname = ucfirst(strtolower($lname)); //make first letter uppercase 
        $_SESSION['reg_lname'] = $lname; // Stores last name into session variable

         //Email
        $em = strip_tags($_POST['reg_email']); //remove html tags
        $em = str_replace(' ','',$em); //remove spaces
        $em = ucfirst(strtolower($em)); //make first letter uppercase 
        $_SESSION['reg_email'] = $em; // Stores email into session variable

         //Email2
        $em2 = strip_tags($_POST['reg_email2']); //remove html tags
        $em2 = str_replace(' ','',$em2); //remove spaces
        $em2 = ucfirst(strtolower($em2)); //make first letter uppercase 
        $_SESSION['reg_email2'] = $em2; // Stores email2 into session variable
        

          //Password
        $password = strip_tags($_POST['reg_password']); //remove html tags

         //Password2
        $password2 = strip_tags($_POST['reg_password2']); //remove html tags

        $date = date("Y-m-d"); // current date

        if($em == $em2){
            if(filter_var($em,FILTER_VALIDATE_EMAIL)){
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);
                //check if email already exists
                $e_check = mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

                //Count the number of rows returned
                $num_rows = mysqli_num_rows($e_check); 

                if($num_rows>0){
                    array_push($error_array,"Email already exists<br>");
                }

            }
            else{
                array_push($error_array,"Invalid email format<br>");
            }
        }
        else{
            array_push($error_array,"Emails don't match!<br>");
        }

        if(strlen($fname) > 25 || strlen($fname) < 2)
        {
            array_push($error_array,"Your first name must be between 2 and 25 characters<br>");
        }
        if(strlen($lname) > 25 || strlen($lname) < 2)
        {
            array_push($error_array,"Your last name must be between 2 and 25 characters<br>");
        }

        if($password!=$password2){
            array_push($error_array,"Your passwords do not match!<br>");
        }
        else{
            if(preg_match('/[^A-Za-z0-9]/',$password)){
                array_push($error_array,"Your password can only contain english characters or numbers<br>");
            }
        }

        if(strlen(($password) > 30 || strlen($password) < 5 ))
        {
            array_push($error_array,"Your password must be between 5 and 30 characters<br>");
        }

        if(empty($error_array)){
            $password = md5($password); // encrypt password

            //Generate username by concatenating first with last name

            $username = strtolower($fname."_".$lname);
            $temp_username = $username;
            $check_username_querry = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            
            $i = 0;

            //if username exists add number to username
            while(mysqli_num_rows($check_username_querry) != 0){
                $i++;
                $username = $temp_username."_".$i;
                $check_username_querry = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            }

            //Profile picture assignment
            $rand = rand(1,2);
            switch($rand){
                case 1:$profile_pic = "/Assets/images/Profile_pic/defaults/head_pete_river.png";break;
                case 2:$profile_pic = "/Assets/images/Profile_pic/defaults/head_amethyst.png";break;
            }

            $querry = mysqli_query($con, "INSERT INTO users VALUES('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0' ,'0','no',',')");

            array_push($error_array,"<span style='color:green'>You're all set! Goahead and login!</span>");

            //clear session variables
            $_SESSION['reg_fname'] ="";
            $_SESSION['reg_lname'] ="";
            $_SESSION['reg_email'] ="";
            $_SESSION['reg_email2'] ="";

        }
    }

?>