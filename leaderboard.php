<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
  <?php
    include('header.php');
    ?>
    <div class="container-fluid section3">
      <?php
        $sql="SELECT  id,reward,reward2,reward3 from register "; //retrieve data from system storage
        include("database_connect.php");    //provide database connection
        $result=mysqli_query($con,$sql);
         if (mysqli_num_rows($result)==0)
        {
           echo "No data found";   
        }
         while($row = mysqli_fetch_assoc($result))//retrieve data one by one
        {
                 $userid=$row["id"];
                 $reward1=$row["reward"];
                 $reward2=$row["reward2"];
                 $reward3=$row["reward3"];
        
                 $reward_count = $reward1+ $reward2+ $reward3;//compute the total reward count
             //    echo $reward_count+"\n";
                 $sql2="update register set rewardcount='$reward_count' where id=$userid ";
                 mysqli_query($con,$sql2);
        }
          ?>
          <?php
          $sql3="SELECT * from register where rewardcount>0 order by rewardcount desc  ";
          $result3=mysqli_query($con,$sql3);
        
            while($row3 = mysqli_fetch_assoc($result3))//retrieve data one by one
         {
                 $userid=$row3["id"];
                 $fname=$row3["fname"];
                 $lname=$row3["lname"];
                 $img=$row3["Image"];
                 $reward3=$row3["reward3"];
        
           ?>
              
          
               
                  <div class="container boardblock">
                  <div class="col-md-3 boardcolomn">
                    <div class="row ">
                     <img src="<?php echo $img?>" height=100px width=100px/>
                      </div>
                    <div class="row">
                     <?php echo $fname?> <?php echo $lname?>
                     </div>

                  </div>
                  <?php
                        $sql4="SELECT * from register where id=$userid";
            
                        $result4=mysqli_query($con,$sql4);
                          while($row4 = mysqli_fetch_array($result4))
                           {
         
           
                            $reward=$row4["reward"];
                            $reward2=$row4["reward2"];
                            $reward3=$row4["reward3"];
                            $score=$row4["rewardcount"];
                           }
                        
    
                  ?>

                  <div class="col-md-5">
                       <div><h3>ACHIEVED REWARDS</h3></div>
                     <div class="row">

                    <?php

                      $rewardimg=NULL;
                      $rewardimg2=NULL;
                      $rewardimg3=NULL;
                      $sql6="select img,description from reward where level='$reward' and type='submission'";
                      $result6=mysqli_query($con,$sql6);
                        while($row6 = mysqli_fetch_array($result6))
                        {

                          $rewardimg=$row6["img"];
                          $title=$row6["description"];
                        }
                           if($rewardimg!=NULL)
                         {
                      ?>
                     <img src=<?= $rewardimg ?> width="120" height="70" data-toggle="tooltip" data-placement="bottom" title=<?=$title?> />
                     

                     <?php
                      }
                     ?>

                    <?php
                    
                            
                          $sql7="select img,description from reward where level='$reward2' and type='vote'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg2=$row7["img"];
                          $title2=$row6["description"];
                        

                        }
                      
                            if($rewardimg2!=NULL)
                         {
                           ?>
                    

                     <img src=<?= $rewardimg2 ?> width="120" height="70"data-toggle="tooltip" data-placement="bottom" title=<?=$title2?> />
                    
                      
                      <?php

                     }
                     ?>

                      <?php
                  
                          $sql7="select img,description from reward where level='$reward3' and type='improvement'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                    
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg3=$row7["img"];
                          $title3=$row6["description"];

                        }
                     
                         if($rewardimg3!=NULL)
                         {
                           ?>
                         
                       

                     <img src=<?= $rewardimg3 ?> width="120" height="70" data-toggle="tooltip" data-placement="bottom" title=<?=$title3?> />

                    <?php

                     }
                    ?>
                 
                   </div>
                  </div>
                  <div class="col-md-3 boardcolomn">
                           <div class="row">

                                     <div class="col-md-6">
                                     <img src="images/score.png" height="60px" weigth="60px"/>
                                     </div>
                                      <div class="col-md-6 scoreimage">
                                         
                                        
                                         <h2><?php echo $score?></h2>
                                        
                                      </div>
                            </div>
                  </div>
              </div>
                   
         <?php    
          }
           
        ?>
        </div>
   
  <?php
    include('footer.php');
    ?>  
</body>
</html>