<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<?php

	session_start();
	$userNo = $_SESSION['userid'];

	$bm4=$bm3=$bm2=$bm1=$en7=$en6=$en5=$en4=$en3=$en2=$en1="javascript: void(0)";
	$it9=$it8=$it7=$it6=$it5=$it4=$it3=$it2=$it1="javascript: void(0)";
	$stringVote=$stringPost=$stringImp=$stringAll="";

	include('database_connect.php');
					//$submissionId = $_SESSION['subId'];
					$sqlGame =  "SELECT reward,reward2,reward3,rewardcount FROM register WHERE id = '$userNo' ";
					$result = mysqli_query($con,$sqlGame);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result))
						{
  		   					$reward1 = $row['reward'];
							$reward2 = $row['reward2'];
							$reward3 = $row['reward3'];
             				$rewardCount = $row['rewardcount'];
						}

					}
				
					else{
								echo 'error'.mysqli_error($con);
						}

				switch($reward2)
				{
					case NULL :
					case 0 :	$stringVote = "You have not received any rewards for casting votes. But enjoy the 1st level of BM faculty. Its' free!"; 
								$bm4 = "gamePage.php?id=level1BM ";
								break;
					case 1 :	$stringVote = "You have received a Bronze medal for Casting Votes. You have unlocked BM Level 2"; 
								$bm4 = "gamePage.php?id=level1BM ";
								$bm3 = "gamePage.php?id=level2BM ";
								break;			
					case 2 :	$stringVote = "You have received a Silver medal for Casting Votes. You have unlocked BM Level 3"; 
								$bm4 = "gamePage.php?id=level1BM ";
								$bm3 = "gamePage.php?id=level2BM ";
								$bm2 = "gamePage.php?id=level3BM ";
								break;	
					case 3 :	$stringVote = "You have received a GOld medal for Casting Votes. You have unlocked BM Level 4"; 
								$bm4 = "gamePage.php?id=level1BM ";
								$bm3 = "gamePage.php?id=level2BM ";
								$bm2 = "gamePage.php?id=level3BM ";
								$bm1 = "gamePage.php?id=level4BM ";
								break;							
				}	
				switch($reward3)
				{
					case NULL :
					case 0 :	$stringPost = "You have not received any rewards for posting comments. But enjoy the 1st level of EN faculty. Its' free!"; 
								$en7 = "gamePage.php?id=level1EN ";
								break;
					case 1 :	$stringPost = "You have received a Bronze medal for posting comments. You have unlocked EN Level 2 and 3"; 
								$en7 = "gamePage.php?id=level1EN ";
								$en6 = "gamePage.php?id=level2EN ";
								$en5 = "gamePage.php?id=level3EN ";
								break;			
					case 2 :	$stringPost = "You have received a Silver medal for posting comments. You have unlocked EN Level 4 and 5"; 
								$en7 = "gamePage.php?id=level1EN ";
								$en6 = "gamePage.php?id=level2EN ";
								$en5 = "gamePage.php?id=level3EN ";
								$en4 = "gamePage.php?id=level4EN ";
								$en3 = "gamePage.php?id=level5EN ";
								break;	
					case 3 :	$stringPost = "You have received a GOld medal for posting comments. You have unlocked EN Level 6 "; 
								$en7 = "gamePage.php?id=level1EN ";
								$en6 = "gamePage.php?id=level2EN ";
								$en5 = "gamePage.php?id=level3EN ";
								$en4 = "gamePage.php?id=level4EN ";
								$en3 = "gamePage.php?id=level5EN ";
								$en2 = "gamePage.php?id=level6EN ";
								//$en1 = "gamePage.php?id=level1BM ";
								break;							
				}
				switch($reward1)
				{
					case NULL :
					case 0 :	$stringImp = "You have not received any rewards for posting submissions. But enjoy the 1st level of IT faculty. Its' free!"; 
								$it9 = "gamePage.php?id=level1IT ";
								break;
					case 1 :	$stringImp = "You have received a Bronze medal for posting submissions. You have unlocked IT Level 2 and 3"; 
								$it9 = "gamePage.php?id=level1IT ";
								$it8 = "gamePage.php?id=level2IT ";
								$it7 = "gamePage.php?id=level3IT ";
								break;			
					case 2 :	$stringImp = "You have received a Silver medal for posting submissions. You have unlocked IT Level 4 and 5"; 
								$it9 = "gamePage.php?id=level1IT ";
								$it8 = "gamePage.php?id=level2IT ";
								$it7 = "gamePage.php?id=level3IT ";
								$it6 = "gamePage.php?id=level4IT ";
								$it5 = "gamePage.php?id=level5IT ";
								break;	
					case 3 :	$stringImp = "You have received a Gold medal for posting submissions. You have unlocked IT Level 6 and 7";
								$it9 = "gamePage.php?id=level1IT ";
								$it8 = "gamePage.php?id=level2IT ";
								$it7 = "gamePage.php?id=level3IT ";
								$it6 = "gamePage.php?id=level4T ";
								$it5 = "gamePage.php?id=level5IT ";
								$it4 = "gamePage.php?id=level6IT ";
								$it3 = "gamePage.php?id=level7IT ";
								break;							
				}	
				switch($rewardCount)
				{
					
					case 7 :	$stringAll = "You have received a total of 7 overall rewards. YOu have unlocked EN level 7"; 
								$en1 = "gamePage.php?id=level7EN ";
								break;
					case 8 :	$stringAll = "You have received  a total of 8 overall rewards. YOu have unlocked IT level 8"; 
								$en1 = "gamePage.php?id=level7EN ";
								$it2 = "gamePage.php?id=level8IT ";
								break;			
					case 9 :	$stringAll = "You have received  a total of 9 overall rewards. YOu have unlocked IT level 9. CONGRATULATIONS, You are an Ideapool allrounder "; 
								$en1 = "gamePage.php?id=level7EN ";
								$it2 = "gamePage.php?id=level8IT ";
								$it1 = "gamePage.php?id=level9IT ";
								break;	
					default :	break;
				}			
?>

<?php
  
    include('header.php');
?>

 <div class="container-fluid game_body">
       <div class="container" >
       		<h1>Game Catalog </h1>
       		<h3><?php echo $stringVote; ?> <h3>
       		<h3><?php echo $stringPost; ?> <h3>
       		<h3><?php echo $stringImp; ?> <h3>
       		<h3><?php echo $stringAll; ?> <h3>
       		<div class="row">
       			<div class="col-md-3 " style="height:1000px; width:30%; margin-right:30px;">
       				<div class="EN" style="width:90%; height:600px; margin-top:380px;" align="center" >
       					<a class= "ENlevel7" href='<?php echo $en1; ?>' > 
       						<div style=" width:100%; height:130px; padding-top:10px; "> </div></a>
       					<a class= "ENlevel6" href='<?php echo $en2; ?>'>
       						<div style=" width:100%; height:70px; padding-top:10px; "> </div> </a>
       					<a class= "ENlevel5" href='<?php echo $en3; ?>'> 
       						<div style=" width:100%; height:50px; padding-top:10px; "> </div></a>
       					<a class= "ENlevel4" href='<?php echo $en4; ?>'> 
       						<div style=" width:100%; height:50px; padding-top:10px; "> </div></a>
       					<a class= "ENlevel3" href='<?php echo $en5; ?>'>
       						<div style=" width:100%; height:60px; padding-top:10px; "> </div> </a>
       					<a class= "ENlevel2" href='<?php echo $en6; ?>'>
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div> </a>
       					<a class= "ENlevel1" href='<?php echo $en7; ?>'>
       						<div style=" width:100%; height:100px; padding-top:30px; "> </div> </a>
       				 </div>
       			</div>

       			<div class="col-md-4" style="height:1000px; width:30%;">
       				<div class="IT" style=" width:80%; height:800px; margin-top:180px;" align="center" >
       					
       						<div style=" width:100%; height:140px; padding-top:40px; "> </div>
       					<a class= "ITlevel9" href='<?php echo $it1; ?>'> 
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel8" href='<?php echo $it2; ?>'> 
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel7" href='<?php echo $it3; ?>'> 
       						<div style=" width:100%; height:70px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel6" href='<?php echo $it4; ?>'> 
       						<div style=" width:100%; height:70px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel5" href='<?php echo $it5; ?>'> 
       						<div style=" width:100%; height:70px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel4" href='<?php echo $it6; ?>'> 
       						<div style=" width:100%; height:70px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel3" href='<?php echo $it7; ?>'> 
       						<div style=" width:100%; height:50px; padding-top:10px; "> </div></a>
       					<a class= "ITlevel2" href='<?php echo $it8; ?>'>
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div> </a>
       					<a class= "ITlevel1" href='<?php echo $it9; ?>' >
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div>  </a>
       					<a class= "ITlevel1" href='<?php echo $it9; ?>' >
       						<div style=" width:100%; height:80px; padding-top:10px; "> </div>  </a>
       				</div>
       			</div>

       			<div class="col-md-4 " style="height:1000px; width:30%;">
       				<div class="BM" style=" width:100%; height:400px; margin-top:580px;" align="center" >
       					<a href= '<?php echo $bm1; ?>' >
       						<div style=" width:100%; height:100px; padding-top:80px; "> </div> </a><br>
       					<a href='<?php echo $bm2; ?>' >
       						<div style=" width:100%; height:50px; padding-top:40px; ">  </div> </a> <br>
       					<a href='<?php echo $bm3; ?>'  >
       						<div style=" width:100%; height:30px; padding-top:30px; ">  </div> </a><br>
       					<a href='<?php echo $bm4; ?>' >
       						<div style=" width:100%; height:80px; padding-top:40px; "> </div> </a> <br>
       				 </div>
       			</div>
       		</div>
       </div>

</div>


</body>
</html>