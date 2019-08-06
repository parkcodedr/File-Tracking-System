<?php

//Protecting Pages
if (!isset($_SESSION['admin'])) {
    header("location: login.php");
}
session_unset($_SESSION['admin']);
header("location: login.php");