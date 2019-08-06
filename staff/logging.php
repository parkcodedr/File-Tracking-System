<?php

require "connection/connection.php";
require('vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$staff = $tracker->staff;
$msg="";



if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if(empty($email) || empty($password)){
        $msg.="<div class='text-danger'> All fields required.</div>";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg.="<div class='text-danger'> Invalid Email.</div>";
    }else{
        $password=md5($password);
        $result=$staff->findOne(['email'=>$email,'password'=>$password]);
        if (!$result) {
            $msg.="<div class='text-danger'> Wrong Email or Password.</div>";
        }else{
            $staff_id = $result->_id;
            $_SESSION['staff'] = $staff_id;
            header("location: index.php");
        }
        


    }





//$getQuery = "SELECT * FROM `users` where `email` = '$email' and `password` = '$password' ;";
//$result = mysqli_query($connection, $getQuery);

//$userData = mysqli_fetch_array($result);

} 

//fetching User from the database
//

