<?php 

session_start();

if(isset($_SESSION['logged_in'])){
    $_SESSION = [];

    header('location:home.php');
    die();
}