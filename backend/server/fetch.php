<?php
require "./phppages/dbconnect.php";

header('Access-Control-Allow-Origin: *');

    $user = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname =$_POST['fullname'];
    $mobile =$_POST['mobile'];
    $times_stamp = date("y/m/d:h:m:l:sa");

   $query = " INSERT INTO `registerd_candidates`( `fullname`, `user`, `password`, `mobile`, `email`, `reg_date`, `subscribed`, `subscription_type`) VALUES ('$fullname','$user','$password','$mobile','$email','$times_stamp','false',' NILL')";
    ##$result=mysqli_query($conn,$query);
##AUTHERNTICATION
    $authenticate_email =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email'";
    $authenticate_mobile =  "SELECT * FROM `registerd_candidates` WHERE `mobile` = '$mobile'";
    $authenticate_user =  "SELECT * FROM `registerd_candidates` WHERE `user` = '$user'";

    
    $execute_authenticate_email= mysqli_query($conn,$authenticate_email);
    $execute_authenticate_mobile= mysqli_query($conn,$authenticate_mobile);
    $execute_authenticate_user= mysqli_query($conn,$authenticate_user);
    
    if(mysqli_num_rows($execute_authenticate_mobile) > 0 and mysqli_num_rows($execute_authenticate_email) > 0){
        print " mobile number and email address already exist. email:";
        print_r(json_encode($_POST['email'].', mobile: '.$_POST['mobile']));
                
            }
   else if(mysqli_num_rows($execute_authenticate_email) > 0){
        echo "An account with this email already exist   ";
        echo '     PLEASE LOGIN';
    }
    else if(mysqli_num_rows($execute_authenticate_mobile) > 0){
        echo "mobile number already exist";

    }
    else if(mysqli_num_rows($execute_authenticate_user) > 0){
        echo "username already taken";

    }
   
    
?>