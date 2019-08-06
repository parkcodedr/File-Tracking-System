<?php

/* require('vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$routes = $tracker->routes;

/*function isPrivileged($connection, $file_id) {
    $fileQuery =  "SELECT  *  FROM `files` WHERE id = $file_id;";
    $getFileResult = mysqli_query($connection,$fileQuery );
    $fileObject = mysqli_fetch_object($getFileResult);
    return $fileObject;
}

*/
function isDispatchable($file_id) {


    $routeD = $routes->findOne(['file_id'=>$file_id]);
    //$fileQuery =  "SELECT  *  FROM `movements` WHERE file_id = $file_id ORDER BY created_at desc LIMIT 1;";
    //$getFileResult = mysqli_query($connection,$fileQuery );
    //$fileObject = mysqli_fetch_object($getFileResult);
    if ($routeD->to_id == $_SESSION['user']) {
        return true;
    }
    return false;
}


?>