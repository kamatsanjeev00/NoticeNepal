
<?php
session_start();
 $nicedate = '2017-11-24';
date_default_timezone_set("Asia/Kathmandu");
if(date('H')>=8){
    $nicedate =date('Y-m-d');
}

$thispage="home";
?>

<?php
function daysRemaining($data){
    
    $d1=strtotime($data);
    $d2=ceil(($d1-time())/60/60/24);
    if($d2<0){
        return 'Expired';
    }else{
        return $d2.' Day/s Left';
    }
}
if(isset($_SESSION["qstr"])){ unset($_SESSION["qstr"]);}

?>

<?php

    
    require_once('cavein/connect.php');
   
    
    $dbc=mysqli_connect($host, $user, $pass, $dbname) or die("Couldn\'t connect to database.");
    
    $query1 = "SELECT * FROM content WHERE publishDate='$nicedate'";
    
    $result=mysqli_query($dbc, $query1)or die('Couldn\'t fetch the data to the database');
?>

<?php

$flag =0;
if(isset($_POST['searchbtn'])){
    if(empty($_POST['search_text']) && $_POST['category']=='default' && $_POST['subcategory']=='default' && $_POST['newspaper']=='default' && empty($_POST['pickeddate'])){
        $flag =1;
    }else{
        $flag=0;
        
        require_once('cavein/cleandata.php');
        $queryarray=array();
        
        
        if(datacleaner(isset($_POST['search_text']))){
            $description=$_POST['search_text'];
            $queryarray['description']=$description;
            
        }
        
        if(isset($_POST['category'])){
            $category=$_POST['category'];
            $queryarray['category']=$category;
            
        }
        
        if(isset($_POST['subcategory'])){
            $subcategory=$_POST['subcategory'];
            $queryarray['subcategory']=$subcategory;
            
        }
        
        if(isset($_POST['newspaper'])){
            $newspaper=$_POST['newspaper'];
            $queryarray['newspaper']=$newspaper;
            
        }
        
        if(isset($_POST['pickeddate'])){
            $pickeddate=$_POST['pickeddate'];
            $queryarray['pickeddate']=$pickeddate;
            
        }
        
        $querystring= http_build_query($queryarray,'', '&');
        
        
    
        
        /*$category=$_POST['category'];
        $subcategory=$_POST['subcategory'];
        $newspaper=$_POST['newspaper'];
        $pickeddate=$_POST['pickeddate'];
        */
        header("Location:search.php?$querystring");
        
    }
    
}


?>


            <!DOCTYPE html>
            <html>

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Notice Nepal</title>
                <link href="styles/normalize.css" rel="stylesheet" type="text/css">
                <link href="styles/style.css" rel="stylesheet" type="text/css">
                
                <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">

               
               <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125185088-1"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());

                  gtag('config', 'UA-125185088-1');
                </script>

                <!-- bootstrab cdn -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
                
                <!-- fontawesome cdn -->
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
                
                <link rel="icon" type="image/png" sizes="16x16" href="img/noticenepalfav.png">
                <!-- jquery date picker js and css files -->
                
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
                <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

                <script>
         $(function() {
            $( "#datepicker" ).datepicker({
            
                dateFormat:"dd-mm-yy",
                beforeShow:function(){
                    $(".ui-datepicker").css('font-size', 14)
                }
            });
         });
      </script>



                <style>

                </style>
            </head>

            <body style="background-color:#8d88f5;">
                <div class="body-container">
                
                <a href="#" id="scroll" style="display: none;"><span></span></a>
              
        </div> <!--end of nav-container wrapper -->
                    
            <?php include_once('nav.php'); ?>
                    
                    
                    
                    

                    <div class="hero-container">
                        <div class="mountainbg"></div>
                        <div class="cloudbg"></div>


                        <div class="search-container">
                           
                            <h1 class="heading1">Your search ends here</h1>
                            <p class="search-p">Welcome! Get all the government and private notices </br>published in major newspaper here!</p>
                            <div class="search-bar">
                                <h1>Search Tender/Notice</h1>
                                <form action="index.php" method="post">
                                    <input id="search-text-input" type="text" placeholder="Type the Name of the publisher Or the Description" name="search_text" />
                                    <p>Apply filters to find it better!</p>
                                    <select name="category">
                                        <option value="default" selected>-Category-</option>
                                        <option value="government">Government</option>
                                        <option value="private">Private</option>
                                        <option value="nonprofit">Non-Profit</option>
                                        <option value="other">Other</option>
                                    </select>

                                    <select name="subcategory">
                                        <option value="default" selected>-Sub-Cate-</option>
                                        <option value="tender">Tender</option>
                                        <option value="aunction">Aunction</option>
                                        <option value="proposal">Proposal</option>
                                        <option value="notice">Notice</option>
                                        <option value="other">Other</option>
                                    </select>

                                    <select name="newspaper">
                                        <option value="default" selected>-NewsPaper-</option>
                                        <option value="kantipur">Kantipur</option>
                                        <option value="kathmandupost">The Kathmandu Post</option>
                                        <option value="gorkhapatra">Gorkhapatra</option>
                                        <option value="himalayantimes">The Himalayan Times</option>
                                        <option value="aarthikabhiyan">Aarthik Abhiyan</option>
                                        <option value="nepalipatra">Nepali Patra</option>
                                        <option value="annapurnapost">Annapurna Post</option>
                                        <option value="karobarecnomic">Karobar Economic Daily</option>
                                        <option value="nagrik">Nagrik</option>
                                        <option value="republica">Republica</option>
                                        <option value="other">Other</option>
                                    </select>

                                    <input type="text" id="datepicker" name="pickeddate" placeholder="Pick Date" readonly="true"/>
                                    <input id="search-bttn" type="submit" value="Search" id="searchbtn" name="searchbtn" />
                                </form>
                                <?php  
                if($flag==1){
                    echo '<p class="text-danger">Please Write a description or Select Any One of the Values from the Drop Down and then Submit !</P>';
                }
                
                ?>
                            </div>

                        </div>
                    </div>
                    <!-- end of header-hero section -->

                    <!-- start of table section -->
                    <div class="content-container">
                        <div class="table-container">
                            <h2>Today's Notice and Tenders</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-condensed">
                                    <tr>
                                        
                                        <th>S.No</th>
                                        <th>Description</th>

                                        <th>Publisher</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Published In</th>
                                        <th>Published On</th>
                                        <th>Last Date</th>
                                        
                                        <th>Day/s Remaining</th>
                                        <th>Image</th>
                                    </tr>
                                    <?php
                   $sno=1;
                   while($row=mysqli_fetch_array($result)){
    
    
                echo '<tr>';
                
                echo '<td>'.$sno.'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo  '<td>'.$row['publisher'].'</td>'; 
                echo  '<td>'.$row['category'].'</td>';
                echo  '<td>'.$row['subcategory'].'</td>';
                echo  '<td>'.$row['newspaper'].'</td>';        
                echo  '<td>'.$row['date'].'</td>';
                echo  '<td>'.$row['lastDate'].'</td>';       
                
                echo  '<td>'.daysRemaining($row['lastDate']).'</td>';       
                echo  '<td><img src="cavein/imgs/'.$row['uimg'].'" style="height:50px;width:50px;" class="imgThumb" /></td>';
                
                echo '</tr>';
                       $sno++;
                   }
                   mysqli_free_result($result);
                mysqli_close($dbc);
                ?>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div>
                       
                        <?php 
    include_once('footer.php');
    ?>
                    </div>
                    <!-- end of nav1 menu -->
                </div>
                
                <!-- modal for image viewing  -->
                
    <div class="modal fade" tabindex="-1" role="dialog">
                   <div class="modal-dialog modal-md">
                       <div class="modal-content">
                         <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NoticeNepal.Com</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                          <div class="modal-body">
                           <img src="" class="img-responsive" style="width:100%" />
                           </div>
                       </div>
                   </div>
                    
    </div>
                
                
                
                
                <?php 
    include_once('footer.php');

    ?>

                    <script type="text/javascript">
                        $(window).scroll(function () {
                            var wScroll = $(this).scrollTop();
                            
                            $('.cloudbg').css({
                                'transform': 'translate(' + wScroll / 8 + 'px,' + wScroll / 10 + '%)'
                            });

                            $('.mountainbg').css({
                                'transform': 'translate(0px,' + wScroll /-5 + 'px)'
                            });

                        });
                    </script>

                   
<script type="text/javascript">
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});


</script>
                   
                   
    <script>
  
      $("body").on("click", ".imgThumb",function(event){
     
         event.preventDefault();
         $(".modal img").attr("src", $(this).attr("src"));
         $(".modal").modal("show");
     }); 
  

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous">
    </script>
            
            </body>

    </html>