<?php
session_start();
if(!isset($_SESSION["lion"]) && !isset($_SESSION["roar"])){
    header("location:login.php");
    exit();
}
   
?>
<?php

    
    require_once('connect.php');
    require_once('cleandata.php');
    
    $dbc=mysqli_connect($host, $user, $pass, $dbname) or die("Couldn\'t connect to database.");
    
    $query1 = "SELECT * FROM content WHERE date='2017-11-30'";
    
    $insertresult=mysqli_query($dbc, $query1)or die('Couldn\'t insert the data to the database');

while($row=mysqli_fetch_array($insertresult)){
    
    
    echo $row['description'].' '.$row['publisher'].' '.$row['category'];
}
    
    mysqli_close($dbc);
    
?>



<!doctype html>
<html>
    <head>
        <title>Add Items</title>
        
        <script></script>
        <link href="../styles/style.css" rel="stylesheet" type="text/css">
        
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script></script>
    </head>
    <body>
        
                
                <a href="publisher.php">Publish todays data</a><br/>
                <a href="index.php">Go To Admin area</a>
                <?php
        include_once('../footer.php')
        ?>
    </body>
</html>

