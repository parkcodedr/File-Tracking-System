<?php
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
session_start();


session_unset($_SESSION['user']);
session_destroy();
header("location:login.php");