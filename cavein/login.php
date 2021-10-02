<?php
//checking if the user is already logged in
session_start();
if(isset($_SESSION['lion']) && isset($_SESSION['roar'])){
    header('location:index.php');
    exit();
}
?>


<?php
require_once('connect.php');
require_once('cleandata.php');
//processing the login form if user has entered data and pressed submit
if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])){
    
  
    $username=datacleaner($_POST['username']);
    $password=datacleaner($_POST['password']);
    if($username=='' || $password==''){
        ?>
        <h3>Please fill in all the form data. <br> Click here to try again <a href="login.php">Login</a></h3>
        <?php
        exit();
    }
    
    
    $dbc= mysqli_connect($host, $user, $pass, $dbname );
    $query="SELECT pass FROM admin WHERE name='$username' LIMIT 1";
$data= mysqli_query($dbc, $query);
    
    

if(mysqli_num_rows($data)==0){
    ?>
   <h3>You have entered worng username or password.<br> Click here to <a href="login.php">Login</a>.</h3>
   <?php
    exit();
    
}
    else{
        /*
        
        while($row=mysqli_fetch_array($data)){
        $hash=$row['pass'];
    }
        if(password_verify($password, $hash)){
        */
        $_SESSION['lion']= $username;
        $_SESSION['roar']= $password;
        mysqli_free_result($data);
        mysqli_close($dbc);    
        header('location:index.php');
        exit();
            
       // }
       // else{
         //   echo "<h3>You have entered worng username or password.<br> Click //here to <a href='login.php'>Login</a>.</h3>";
        //}
    }
    
}
?>




<html>
    <head>
        <title>Admin Login</title>
        <link rel="icon" type="image/png" sizes="16x16" href="img/noticenepalfav.png">
        <style>
            body{
                background-color: lightgrey;
            }
        </style>
    </head>
    <body>
        <h2>Please Enter Your Login data.</h2>
        <form action="login.php" method="post" enctype="multipart/form-data" name="adminlogin" id="adminlogin">
            <label for="username">Username</label>
<input type="text" id="username" name="username" value="<?php if(!empty($username)) echo $username; ?>" /><br />
<label for ="password">Password</label>
<input type="password" id="password" name="password" />

<input type="submit" value="Log In" name="submit" />
            
        </form>
    </body>
</html>






























