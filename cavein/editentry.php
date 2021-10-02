<?php
session_start();
if(!isset($_SESSION["lion"]) && !isset($_SESSION["roar"])){
    header("location:login.php");
    exit();
}
?>


                                     
                                      
<?php
    require_once('connect.php');
    $mydate=date('Y-m-d');
    $dbc=mysqli_connect($host, $user, $pass, $dbname) or die("Couldn\'t connect to database.");


$query="SELECT * FROM content WHERE publishDate='$mydate'";

$result= mysqli_query($dbc, $query) or die('Couldn\'t query the database!');
?>

<html>
<head>
    <title>Edit Entry</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/noticenepalfav.png">
    <style>
        
        table{
            border-collapse: collapse;
        }
        table, th, td{
            border:1px solid black;
        }
    </style>
</head>
<body>
<?php
echo '<table>';
echo '<tr><th>Id</th><th>Description</th><th>Publisher</th><th>category</th><th>subcategory</th><th>Date</th><th>Last Submission Date</th><th>Newspaper</th>
<th>Edit</th></tr>';
while($row=mysqli_fetch_array($result)){
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['description'].'</td>';
    echo '<td>'.$row['publisher'].'</td>';
    echo '<td>'.$row['category'].'</td>';
    echo '<td>'.$row['subcategory'].'</td>';
    echo '<td>'.$row['date'].'</td>';
    echo '<td>'.$row['lastDate'].'</td>';
    echo '<td>'.$row['newspaper'].'</td>';
    echo '<td><a href="edit.php?id='.$row['id'].'">Edit Entry</a></td>';
    echo '</tr>';
}

echo '</table>';
mysqli_close($dbc);
echo '<a href="index.php">Go to admin home</a>';
echo '<a href="/index.php">Go to Home page</a>';
?>
</body>
</html>
