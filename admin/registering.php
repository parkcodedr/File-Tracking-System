<?php
    require "connection/connection.php";
    require('vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$staff = $tracker->staff;
$msg="";
//Protecting Pages

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) or empty($email) or empty($password) or empty($confirm_password)) {
        $msg.="<div class='text-danger'> All fields are compulsory.</div>";
    }else if ($password != $confirm_password) {
        $msg.="<div class='text-danger'> Password did not match.</div>";
    }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $msg.="<div class='text-danger'> Invalid Email.</div>";
    
    }else{
        $password=md5($password);
$staff_id="STF20".rand(00000,99999);
$staff->insertOne(['_id'=>$staff_id,'name'=>$name,'email'=>$email,'password'=>$password]);
if($staff){
    $msg.="<div class='text-success'> Registered Successfully.</div>";
}else{
    $msg.="<div class='text-danger'> Error Occur.</div>";
}

    }
}


//Now we can insert this data into the database

//Remember to write query in between double quotes.

//$insertQuery = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name','$email','$password')";
//$result = mysqli_query($connection, $insertQuery);

//header("location: index.php");
