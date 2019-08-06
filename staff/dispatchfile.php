<?php
session_start();
require('../vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$routes = $tracker->routes;
$user=$tracker->users;
$staff=$tracker->staff;
$file=$tracker->files;
$notification=$tracker->notification;



$staffObject =$staff->find([]);
    
$to_id = $_POST["dispatch_name"];
$file_id = $_POST["file_id"];
$note = $_POST["note"];

$staff_id = $_SESSION['staff'];
$staffoffice = $staff->findOne(['_id'=>$staff_id]);
$fromOffice = $office->find(['_id'=>$staffoffice->office_id]);

$route_id = "ROT".rand(0000,9999);
$routes->insertOne(['_id'=>$route_id,'from_id'=>$staffoffice->office_id,'file_id'=>$file_id,'to_id'=>$to_id,'note'=>$note]);

$fileObject = $file->findOne(['_id'=>$file_id]);
$name = ($fileObject->name);

$date = date('Y-m-d:h-i-s');
$notification->insertOne(['user_id'=>$to_id,'content'=>'A file with name  '.$fileObject->name.'  has been arrived from  '.$fromOffice->name.'  with note: '.$note,'add_time'=>$date]);
 

