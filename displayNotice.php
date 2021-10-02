
           
<?php
           // get the info from the db 
echo $str1;
            //$query1 = "SELECT * FROM content WHERE $str1 AND lastDate>='$nicedate' LIMIT $offset, $rowsperpage";

            $query1 = "SELECT * FROM content WHERE $str1 AND lastDate>='$nicedate' LIMIT $offset, $rowsperpage";
            
    
            $result=mysqli_query($dbc, $query1)or die('Couldn\'t fetch the data from the database');
            if($result)
               { 
                   
                   
            echo  '<div class="table-responsive">';
               echo '<table class="table table-striped table-bordered table-condensed">';
               echo '<tr style="font-size:0.85rem;">';
                   
                   echo '<th>S.No</th>';
                   echo '<th>Description</th>';

                   echo '<th>Publisher</th>';
                   echo '<th>Category</th>';
                   echo '<th>Sub-Category</th>';
                   echo '<th>Published In</th>';
                   echo '<th>Published On</th>';
                   echo '<th>Last Date</th>';
                   echo '<th>Day/s Remaining</th>';
                   
                   echo '<th>Image</th>';
               echo '</tr>';
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
                
                echo '</table>';
                   echo '</div>';
               } 
               else { 
                   echo '<p> Nothing found ! </p>';
                     
                     } 
            ?>