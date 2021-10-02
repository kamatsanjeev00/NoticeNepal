<?php
session_start();
if(!isset($_SESSION["lion"]) && !isset($_SESSION["roar"])){
    header("location:login.php");
    exit();
}
   
?>
<?php

$target_dir ="imgs/";

$uploadOk=0;

if(isset($_POST['additem'])&& !empty($_POST['description']) && !empty($_POST['publisher']) && !empty($_POST['category']) && !empty($_POST['subcategory']) && !empty($_POST['newspaper']) && !empty($_POST['pickeddate'])&&
!empty($_POST['lastDate'])){
    
    $target_file= $target_dir.basename($_FILES['imgUpload']['name']);
$imgFileType= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    
    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
    if($check !== false){
        $uploadOK=1;
    }else{ $uploadOk =0;}
    
    //checking if file already exists
    if(file_exists($target_file)){
        $uploadOk=0;
    }else{$uploadOk =1;}
    
    //checking file size
    if(($_FILES['imgUpload']['size']>0)&&($_FILES['imgUpload']['size']<=500000)){
        $uploadOk=1;
    }else{$uploadOk=0;}
    
    //checking file type
    if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif"){
        $uploadOk =0;
    }else{ $uploadOk=1;}
    
    if($_FILES['imgUpload']['error']){
        $uploadOk=0;
    }else{$uploadOk=1;}
    
    if($uploadOk==0){echo 'file was not uploaded try again!';}else{
        if(move_uploaded_file($_FILES['imgUpload']['tmp_name'], $target_file)){
    require_once('connect.php');
    require_once('cleandata.php');
    $description = datacleaner($_POST['description']);
    $publisher = datacleaner($_POST['publisher']);
    $category = datacleaner($_POST['category']);
    $subcategory = datacleaner($_POST['subcategory']);
    $newspaper = datacleaner($_POST['newspaper']);
    $pickeddate = datacleaner($_POST['pickeddate']);
    $lastDate = datacleaner($_POST['lastDate']);        
    $imgName=$_FILES['imgUpload']['name'];
    
    date_default_timezone_set("Asia/Kathmandu");
    $publishDate=date('Y-m-d');
            
            
    $dbc=mysqli_connect($host, $user, $pass, $dbname) or die("Couldn\'t connect to database.");
    
    $query1 = "INSERT INTO content VALUES(0, '$description', '$publisher', '$category', '$subcategory', '$newspaper', '$pickeddate','$lastDate','$publishDate','$imgName','0')";
    
    $insertresult=mysqli_query($dbc, $query1)or die('Couldn\'t insert the data to the database');
    
    if($insertresult){
        echo '<h3>The info with following details has been added</h3>';
        echo nl2br("\n Id :Description: $description \t Publisher : $publisher \n Category : $category\t Newspaper : $newspaper\n Published On: $pickeddate\n Last Date For Submission: $lastDate" );
        echo $imgName;
        
        echo '<a href="editentry.php">Edit Entry</a></button>';
        

    }
    
    mysqli_close($dbc);
    
    
        }
    
    }
}
else if(isset($_POST['additem'])){
    
    if((empty($_POST['description'])))
    echo "Please enter 'description' and try again !";
    
    if((empty($_POST['publisher'])))
    echo "Please enter 'publisher' and try again !";
    
    if((empty($_POST['pickeddate'])))
    echo "Please select a Date and try again !";
    
    if((empty($_POST['lastDate'])))
    echo "Please select a Date and try again !";
    if($_FILES['imgUpload']['error']){
        echo 'Error uploading file';
    }
    
    
    
   
  
        //echo "$description $publisher $category $subcategory $newspaper //$pickeddate" ;
}

?>
<!doctype html>
<html>
    <head>
       <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <title>Add Items</title>
        <link rel="icon" type="image/png" sizes="16x16" href="img/noticenepalfav.png">
        
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        
        <!-- fontawesome cdn -->
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
                
        
        
        <link href="../styles/style.css" rel="stylesheet" type="text/css">
        
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
       $(function() {
               $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>
    </head>
    <body style="padding-bottom:0px;padding-top:45px;">
      <div class="container-fluid">
      <div class="row">
      <div class="col">
       <div class="w-50 mx-auto">
       
        <h3 class="text-center mb-4">Fill in the form below and submit to add data.</h3>
        <form action="additem.php" method="post" class="" enctype="multipart/form-data" name="additemform" id="additemform">
            
            <div class="row">
        <div class="form-group col-md-6 col-lg-6">                
            <label for="description">Description</label>
            <textarea class="form-control" rows="3" name="description" id="description" maxlength="200" required="required"></textarea>
            </div>
            
        <div class="form-group col-md-6 col-lg-6">          
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" id="publisher" style="" required>
            
            </div>
            </div>
            <div class="row">
         <div class="form-group col-md-6 col-lg-6">         
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                    <option value="government" selected>Government</option>
                    <option value="private">Private</option>
                    <option value="nonprofit">Non-Profit</option>
                    <option value="other">Other</option>
             </select> 
             </div>
             
         <div class="form-group col-md-6 col-lg-6">         
            <label for="subcategory">Sub-Category</label>
            <select name="subcategory" class="form-control" id="subcategory">
                    <option value="tender" selected>Tender</option>
                    <option value="aunction">Aunction</option>
                    <option value="proposal">Proposal</option>
                    <option value="notice">Notice</option>
                    <option value="other">Other</option>
             </select> 
             </div>
             </div>
             
            <div class="row"> 
          <div class="form-group col-md-6 col-lg-6">        
            <label for="newspaper">Newspaper</label>
            <select name="newspaper" class="form-control" id="newspaper">
                      <option value="kantipur" selected>Kantipur</option>
                      <option value="kathmandupost">The Kathmandu Post</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Humalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                      <option value="nepalipatra">Nepali Patra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik</option>
                      <option value="republica">Republica</option>
              </select> 
              </div>
              
            <div class="form-group col-md-6 col-lg-6"> 
                 <label for="pickeddate">Publish Date</label> 
            <input type="text" style="width:100%; height:2.5rem; padding:5px;" class="form-control datepicker" name="pickeddate" placeholder="Pick Date"/>
            
            </div>

           <div class="form-group col-md-6 col-lg-6"> 
                 <label for="pickeddate">Last Date For Submission</label> 
            <input type="text" style="width:100%; height:2.5rem; padding:5px;" class="form-control datepicker" name="lastDate" placeholder="Pick Date"/>
            
            </div>

                                 
            <div class="row">
            <div class="form-group col-md-6 col-lg-6">
                <label for="fileinput">Upload Image</label>
                <input type="file" id="imgUpload" name="imgUpload">
            </div>
            <div class="col-lg-6">
            <input id="additem" class="btn btn-primary btn-block mt-3" type="submit" value="Add Item" name="additem" />
            </div>
            </div>
            </div>   
                </form>
            
                <div>
                <a href="../index.php">Go Home</a>
                <a href="publishScript.php">Publish todays data</a><br/>
                <a href="index.php">Go To Admin area</a>
        </div>
          </div>
             
              
               
        
        
        </div>
        </div></div>
        <?php
        include_once('../footer.php')
        ?>  
        <!--
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </body>
</html>

