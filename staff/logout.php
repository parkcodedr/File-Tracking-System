<?php

//Protecting Pages
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
session_unset($_SESSION['user']);
header("location: login.php");