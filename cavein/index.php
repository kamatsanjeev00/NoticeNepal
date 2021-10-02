<?php
session_start();
if(!isset($_SESSION["lion"]) && !isset($_SESSION["roar"])){
    header("location:login.php");
    exit();
}

?>



<html>
    <head>
        <title>Admin Home</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../img/noticenepalfav.png">
        <style>
            h2{
                color: green;
                
            }
            
            a{
                text-decoration: none;
                display: block;
                color: blue;
                font-size: 20px;
            }
            
            a:hover{
                color: darkblue;
            }
        </style>
      
    </head>
    <body>
        <h2>Welcome Admin</h2>
  <a href="additem.php">Start Adding Items</a>
   <a href="../index.php">Go To Home Page</a>
   <a href="logout.php">LogOut</a>
    </body>
</html>