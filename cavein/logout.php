<?php
session_start();
if(isset($_SESSION["lion"]) && isset($_SESSION["roar"])){
    session_unset();
    session_destroy();
    header("location:login.php");
    exit();
}

   
?>