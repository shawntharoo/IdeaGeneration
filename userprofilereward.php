 <div style="width: 220px;margin:none">
                    <h2>MY ACHEIVEMENTS</h2>
                      <p>SUBMISSIONS</p>
                    <?php
                       include("database_connect.php");
                        $sql5="SELECT * from register where id=$userNo";
            
                         $result5=mysqli_query($con,$sql5);
                    while($row5 = mysqli_fetch_array($result5))
                    {
         
           
       
                          $reward=$row5["reward"];
                          $reward2=$row5["reward2"];
                          $reward3=$row5["reward3"];
                       }
          
                      $rewardimg=NULL;
                      $rewardimg2=NULL;
                      $rewardimg3=NULL;
                      $rewardimg4=NULL;
                  
                     
                              
                     if ($reward==1)
                   {
                      $sql6="select img,name from reward where level='$reward' and type='submission'";
                      $result6=mysqli_query($con,$sql6);
                        while($row6 = mysqli_fetch_array($result6))
                        {

                          $rewardimg=$row6["img"];
                           $title=$row6["name"];

                        }
                      ?>
   <img src=<?= $rewardimg ?> width="40" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title?> />

                    <?php
                    }
                    if($reward==2)
                    {
                          $sql7="select img,name from reward where level='$reward' and type='submission'";
                          $sql6="select img,name from reward where level='1' and type='submission'";
                          $result6=mysqli_query($con,$sql6);
                          $result7=mysqli_query($con,$sql7);
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg2=$row7["img"];
                           $title=$row7["name"];
                        

                        }
                        while($row6 = mysqli_fetch_array($result6))
                        {

                          $rewardimg1=$row6["img"];
                           $title2=$row6["name"];


                        }

                           ?>
                     <img src=<?= $rewardimg1 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title2?> />

                     <img src=<?= $rewardimg2 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title?> />
                    

                    <?php
                    }
                    ?>
                      <?php
                     if($reward==3)
                    {
                          $sql7="select img,name from reward where level='$reward' and type='submission'";
                          $sql6="select img,name from reward where level='1' and type='submission'";
                          $sql8="select img,name from reward where level='2' and type='submission'";
                          $result6=mysqli_query($con,$sql6);
                          $result7=mysqli_query($con,$sql7);
                          $result8=mysqli_query($con,$sql8);
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg2=$row7["img"];
                           $title=$row7["name"];
                        

                        }
                        while($row6 = mysqli_fetch_array($result6))
                        {

                          $rewardimg1=$row6["img"];
                           $title2=$row6["name"];

                        }
                            while($row8 = mysqli_fetch_array($result8))
                        {

                          $rewardimg3=$row8["img"];
                           $title3=$row8["name"];

                        }

                           ?>
                     <img src=<?= $rewardimg1 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title2?> />

                     <img src=<?= $rewardimg3?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title3?> />

                     <img src=<?= $rewardimg2 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title?> />
                    

                     <?php
                      }
                     ?>
                     </div>
 <div style="width: 220px;margin:none">
          <p>VOTES</p>
                    <?php
                    
                            
                          $sql7="select img,name from reward where level='$reward2' and type='vote'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg2=$row7["img"];
                          $title2=$row6["name"];
                        

                        }
                      
                            if($rewardimg2!=NULL)
                         {
                           ?>
                    

                     <img src=<?= $rewardimg2 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title2?> />
                    </div>
    <div style="width: 220px;margin:none">
     <p>IMPROVEMENTS</p>
                      <?php

                     }
                     ?>

                      <?php
                        
                          $sql7="select img,name from reward where level='$reward3' and type='improvement'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                    
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg4=$row7["img"];
                          $title3=$row6["name"];

                        }
                     
                        if($rewardimg4!=NULL)
                         {
                           ?>
                         
                       

                     <img src=<?= $rewardimg4 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title3?> />

                    <?php

                     }
                    ?>
                 </div>