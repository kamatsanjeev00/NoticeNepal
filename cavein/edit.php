<?php
session_start();
if(!isset($_SESSION["lion"]) && !isset($_SESSION["roar"])){
    header("location:login.php");
    exit();
}
?>
<?php
//function to render form
function renderForm($id, $description, $publisher, $category, $subcategory, $date, $lastDate, $newspaper){
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <link rel="icon" type="image/png" sizes="16x16" href="img/noticenepalfav.png">
        </head>
        
        <body>
            <h2>Edit the details and Submit</h2>
            <form action="edit.php" method="post" enctype="multipart/form-data" name="edititemform" id="edititemform">
                  <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                  
                  <p><strong>ID</strong><?php echo $id;?></p>
                  
                  <label for="description">Description</label>
            <textarea rows="2" cols="50" name="description" id="description" maxlength="200" required="required"><?php echo $description; ?></textarea><br />
                  <label for="publisher">Publisher</label>
                  <input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>" required>
                  <br />
                  <label for="category">Category</label>
                  <select name="category" id="category">
                    
                     <?php
    //displaying previously selected value
    
    switch($category){
        case "government":
            echo '<option value="government" selected>Government</option>
           
                      <option value="private">Private</option>
                      <option value="nonprofit">Non-Profit</option>
                      <option value="other">Other</option>';
            break;
        case "private":  
            echo '<option value="private" selected>Private</option>
            <option value="government" >Government</option>
                     
                      <option value="nonprofit">Non-Profit</option>
                      <option value="other">Other</option>';
            break;
        case "non-profit":  
            echo '<option value="non-profit" selected>Non-Profit</option>
                <option value="government" >Government</option>
                      <option value="private">Private</option>
                      
                      <option value="other">Other</option>';
            break;
        case "other":  
            echo '<option value="private" selected>Other</option>
            <option value="government" >Government</option>
                      <option value="private">Private</option>
                      <option value="nonprofit">Non-Profit</option>';
            break;
            
            
    }
    ?>                 
    
    
                  
                  </select>
                    
                     
                  <br />
                  <label for="subcategory">Sub-Category</label>
                  <select name="subcategory" id="subcategory">
                      
    <?php
    //displaying previously selected value
    
    switch($subcategory){
        case "tender":
            echo '<option value="tender" selected>Tender</option>
                 <option value="aunction">Aunction</option>
                      <option value="proposal">Proposal</option>
                      <option value="notice">Notice</option>
                      <option value="other">Other</option>';
            
            break;
        case "aunction":  
            echo '<option value="aunction" selected>Aunction</option>
            <option value="tender">Tender</option>
                      
                      <option value="proposal">Proposal</option>
                      <option value="notice">Notice</option>
                      <option value="other">Other</option>';
            
            break;
        case "proposal":  
            echo '<option value="proposal" selected>Proposal</option>
                <option value="tender">Tender</option>
                      <option value="aunction">Aunction</option>
                      <option value="notice">Notice</option>
                      <option value="other">Other</option>';
            
            break;
        case "notice":  
            echo '<option value="notice" selected>Notice</option>
            <option value="tender">Tender</option>
                      <option value="aunction">Aunction</option>
                      <option value="proposal">Proposal</option>
                      <option value="other">Other</option>';
            
            break;
            
            
        case "other":  
            echo '<option value="other" selected>Other</option>
            <option value="tender">Tender</option>
                      <option value="aunction">Aunction</option>
                      <option value="proposal">Proposal</option>
                      <option value="notice">Notice</option>';
            
            break;
            
            
    }
    ?>                 
                      
                  
                                        </select> 
                  <br />
                  <label for="newspaper">Newspaper</label>
                  <select name="newspaper" id="newspaper">
                     
                     
                      <?php
    switch($newspaper){
        case "kantipur":
            echo '<option value="kantipur" selected>Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break;
            
            
            
    case "kathmandupost":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost" selected>The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
            
    case "gorkhapatra":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra" selected>Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
     
    case "himalayantimes":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes" selected>Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break;
            
    case "aarthikabhiyan":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan" selected>Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
    
    case "nepalipatra":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra" selected>Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
    
    case "annapurnapost":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost" selected>Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
            
    case "karobareconomic":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic" selected>Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
    case "nagrik":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik" selected>Nagrik </option>
                      <option value="republica">Republica </option>';
            
            break; 
    
    case "republica":
            echo '<option value="kantipur" >Kantipur</option>
            <option value="kathmandupost">The Kathmandupost</option>
                      <option value="gorkhapatra">Gorkhapatra</option>
                      <option value="himalayantimes">Himalayan Times</option>
                      <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                    <option value="nepalipatra">Nepalipatra</option>
                      <option value="annapurnapost">Annapurna Post</option>
                      <option value="karobareconomic">Karobar Economic Daily</option>
                      <option value="nagrik">Nagrik </option>
                      <option value="republica" selected>Republica </option>';
            
            break; 
    
    
            
    }
    
    ?>
                  </select> 
                 <br/>
            Publish Date:<input type="text" class="datepicker" name="date" value="<?php echo $date; ?>"></input>
                 
            Submission Last Date:<input type="text" class="datepicker" name="lastDate" value="<?php echo $lastDate; ?>"></input><br />

    
                  <input id="edititem" type="submit" value="Make Changes" name="edititem" />
                </form>
        
            
        </body>
    </html>
    
    
<?php 
}


    require_once('connect.php');

$dbc=mysqli_connect($host, $user, $pass, $dbname) or die("Error connecting to the database!");

if(isset($_POST['edititem'])){
    //checking for the id variable
    if(isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'])>=0){
        //getting form data
        $id= $_POST['id'];
        $description=mysql_real_escape_string(htmlspecialchars($_POST['description']));
    $publisher=mysql_real_escape_string(htmlspecialchars($_POST['publisher']));
    $category=mysql_real_escape_string(htmlspecialchars($_POST['category']));
    $subcategory=mysql_real_escape_string(htmlspecialchars($_POST['subcategory']));
        $newspaper=mysql_real_escape_string(htmlspecialchars($_POST['newspaper']));
        
    $date=mysql_real_escape_string(htmlspecialchars(
        $_POST['date']));
    $lastDate=mysql_real_escape_string(htmlspecialchars(
        $_POST['lastDate']));
    
        
    if($description=='' || $publisher=='' || $category=='' || $subcategory=='' || $date=='' ||
    $lastDate=='' || $newspaper==''){
        
        echo '<h3 style="color:red">*Errors Please fill all the fields.</h3>';
        //since one or all the fields are empty rendering form
    renderForm($id, $description, $publisher, $category, $subcategory, $date, $lastDate, $newspaper);
        
        
    }
        else{
            //since all the fields have values update the database
            
            $query ="UPDATE content SET description='$description', publisher='$publisher', category='$category', subcategory='$subcategory', newspaper='$newspaper', date='$date', lastDate='$lastDate' WHERE id='$id' LIMIT 1";
            $result=mysqli_query($dbc, $query) or die('Error: Couldn\'t query the database!');
            
            if($result){
                echo '<h2 style="color:green;">The database was updated!<br />With these values:</h2>';
                echo '<h3 style="color:red">Publisher :<span style="color:green">'.$publisher.'</span></h3>';
                
                echo '<h3 style="color:red">Category :<span style="color:green">'.$category.'</span></h3>';
                
                echo '<h3 style="color:red">Sub-category :<span style="color:green">'.$subcategory.'</span></h3>';
                
                echo '<h3 style="color:red">Newspaper :<span style="color:green">'.$newspaper.'</span></h3>';
                
                echo '<h3 style="color:red">Date :<span style="color:green">'.$date.'</span></h3>';
                
                echo '<h3 style="color:red">Date :<span style="color:green">'.$lastDate.'</span></h3>';

                
                echo '<a href="../index.php">Go To Home Page</a><br />';
                echo '<a href="index.php">Go To Admin Area</a><br /><br />';
                echo '<a href="edit.php?id='.$id.'">Edit Entry</a>';
                
                
                    mysqli_close($dbc);
                    
            }
            
        }
    
    
    }
    
    
}


else{
    
    if(is_numeric($_GET['id']) && ($_GET['id'])>=0){
    $id= $_GET['id'];






$query ="SELECT * FROM content where id='$id'";
$result=mysqli_query($dbc, $query) or die("unable to execute the query!");
        
        
$existsRows=mysqli_num_rows($result);

if($existsRows){
while($row=mysqli_fetch_array($result)){
    $description=$row['description'];
    $publisher=$row['publisher'];
    $category=$row['category'];
    $subcategory=$row['subcategory'];
    $date=$row['date'];
    $lastDate= $row['lastDate'];
    $newspaper=$row['newspaper'];
    
}
    renderForm($id, $description, $publisher, $category, $subcategory, $date, $lastDate, $newspaper);
}else{
    echo 'Error No result found !';
        exit();
}
}

}



?>