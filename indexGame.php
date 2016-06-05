
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>

<!-- bootstrap table scripts -->

<script src="//static.miniclipcdn.com/js/game-embed.js"></script>


<!-- popup the edit window -->

<!-- end of the popup window -->
<title>IDEAPOOL Game Page</title>
<!-- body style/ table margin -->
</head>




<body>
<?php
include('header.php');
?>

<div class="container">

<script src="//static.miniclipcdn.com/js/game-embed.js"></script>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
?>
<br/>
 <div class="col-md-4">
 <div class="jumbotron">
  <h2><span class="label label-default">IDEAPOOL</span></h2><br/>
  <p><a class="btn btn-success btn-lg" href="register.php" role="button">Register</a></p>
  <img src="images/interesting.jpg" class="img-responsive" alt="">
  <br/>
  <p>Are you already a member?</p>
  <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
</div>
 </div>
  <div class="col-md-1">
  </div>
 <div class="col-md-7">
<?php
$query1 = "select * from games where ID = '1'";
$result1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($result1)){ 
  $Available1 = $row['Availability'];
}
$query2 = "select * from games where ID = '2'";
$result2=mysqli_query($con,$query2);
while($row=mysqli_fetch_array($result2)){ 
  $Available2 = $row['Availability'];
}
$query3 = "select * from games where ID = '3'";
$result3=mysqli_query($con,$query3);
while($row=mysqli_fetch_array($result3)){ 
  $Available3 = $row['Availability'];
}
$query4 = "select * from games where ID = '4'";
$result4=mysqli_query($con,$query4);
while($row=mysqli_fetch_array($result4)){ 
  $Available4 = $row['Availability'];
}
$query5 = "select * from games where ID = '5'";
$result5=mysqli_query($con,$query5);
while($row=mysqli_fetch_array($result5)){ 
  $Available5 = $row['Availability'];
}
$query6 = "select * from games where ID = '6'";
$result6=mysqli_query($con,$query6);
while($row=mysqli_fetch_array($result6)){ 
  $Available6 = $row['Availability'];
}
  if($Available1 == 1){ ?>
<div class="miniclip-game-embed" data-game-name="thunderbirds" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/thunderbirds/">Play Thunderbirds Are Go: Team Rush</a></div>
 <?php } else if($Available2 == 1){ ?>
 <div class="miniclip-game-embed" data-game-name="free-running-2" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/free-running-2/">Play Free Running 2</a></div><br/>
  <?php } else if($Available3 == 1){?>
  <div class="miniclip-game-embed" data-game-name="8-ball-pool-multiplayer" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/8-ball-pool-multiplayer/">Play 8 Ball Pool</a></div><br/>
 <?php } else if($Available4 == 1){?>
<div class="miniclip-game-embed" data-game-name="basketball-stars" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/basketball-stars/">Play Basketball Stars</a></div><br/>
<?php } else if($Available5 == 1){?>
<div class="miniclip-game-embed" data-game-name="big-snow-tricks" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/big-snow-tricks/">Play Big Snow Tricks</a></div><br/>
<?php } else if($Available6 == 1){?>
<div class="miniclip-game-embed" data-game-name="bow-master-japan" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/bow-master-japan/">Play Bow Master Japan</a></div><br/>
<?php } else{?>
  <img class="media-object" src="images/under-construction-20-19.jpg" height="500" width="700" align="middle">
<?php } ?>
</div>
</div>

<script language="JavaScript1.2">


var Ymax=8;                                //MAX # OF PIXEL STEPS IN THE "X" DIRECTION
var Xmax=8;                                //MAX # OF PIXEL STEPS IN THE "Y" DIRECTION
var Tmax=10000;                        //MAX # OF MILLISECONDS BETWEEN PARAMETER CHANGES

//FLOATING IMAGE URLS FOR EACH IMAGE. ADD OR DELETE ENTRIES. KEEP ELEMENT NUMERICAL ORDER STARTING WITH "0" !!

var floatimages=new Array();
floatimages[0]='images/butterfly2.gif';
floatimages[1]='images/butterfly2.gif';

//*********DO NOT EDIT BELOW***********
var NS4 = (navigator.appName.indexOf("Netscape")>=0 && parseFloat(navigator.appVersion) >= 4 && parseFloat(navigator.appVersion) < 5)? true : false;
var IE4 = (document.all)? true : false;
var NS6 = (parseFloat(navigator.appVersion) >= 5 && navigator.appName.indexOf("Netscape")>=0 )? true: false;
var wind_w, wind_h, t='', IDs=new Array();
for(i=0; i<floatimages.length; i++){
t+=(NS4)?'<layer name="pic'+i+'" visibility="hide" width="10" height="10"><a href="javascript:hidebutterfly()">' : '<div id="pic'+i+'" style="position:absolute; visibility:hidden;width:10px; height:10px; z-index:1000"><a href="javascript:hidebutterfly()">';
t+='<img src="'+floatimages[i]+'" name="p'+i+'" border="0">';
t+=(NS4)? '</a></layer>':'</a></div>';
}
document.write(t);

function moveimage(num){
if(getidleft(num)+IDs[num].W+IDs[num].Xstep >= wind_w+getscrollx())IDs[num].Xdir=false;
if(getidleft(num)-IDs[num].Xstep<=getscrollx())IDs[num].Xdir=true;
if(getidtop(num)+IDs[num].H+IDs[num].Ystep >= wind_h+getscrolly())IDs[num].Ydir=false;
if(getidtop(num)-IDs[num].Ystep<=getscrolly())IDs[num].Ydir=true;
moveidby(num, (IDs[num].Xdir)? IDs[num].Xstep :  -IDs[num].Xstep , (IDs[num].Ydir)?  IDs[num].Ystep:  -IDs[num].Ystep);
}

function getnewprops(num){
IDs[num].Ydir=Math.floor(Math.random()*2)>0;
IDs[num].Xdir=Math.floor(Math.random()*2)>0;
IDs[num].Ystep=Math.ceil(Math.random()*Ymax);
IDs[num].Xstep=Math.ceil(Math.random()*Xmax)
setTimeout('getnewprops('+num+')', Math.floor(Math.random()*Tmax));
}

function getscrollx(){
if(NS4 || NS6)return window.pageXOffset;
if(IE4)return document.body.scrollLeft;
}

function getscrolly(){
if(NS4 || NS6)return window.pageYOffset;
if(IE4)return document.body.scrollTop;
}

function getid(name){
if(NS4)return document.layers[name];
if(IE4)return document.all[name];
if(NS6)return document.getElementById(name);
}

function moveidto(num,x,y){
if(NS4)IDs[num].moveTo(x,y);
if(IE4 || NS6){
IDs[num].style.left=x+'px';
IDs[num].style.top=y+'px';
}}

function getidleft(num){
if(NS4)return IDs[num].left;
if(IE4 || NS6)return parseInt(IDs[num].style.left);
}

function getidtop(num){
if(NS4)return IDs[num].top;
if(IE4 || NS6)return parseInt(IDs[num].style.top);
}

function moveidby(num,dx,dy){
if(NS4)IDs[num].moveBy(dx, dy);
if(IE4 || NS6){
IDs[num].style.left=(getidleft(num)+dx)+'px';
IDs[num].style.top=(getidtop(num)+dy)+'px';
}}

function getwindowwidth(){
if(NS4 || NS6)return window.innerWidth;
if(IE4)return document.body.clientWidth;
}

function getwindowheight(){
if(NS4 || NS6)return window.innerHeight;
if(IE4)return document.body.clientHeight;
}

function init(){
wind_w=getwindowwidth();
wind_h=getwindowheight();
for(i=0; i<floatimages.length; i++){
IDs[i]=getid('pic'+i);
if(NS4){
IDs[i].W=IDs[i].document.images["p"+i].width;
IDs[i].H=IDs[i].document.images["p"+i].height;
}
if(NS6 || IE4){
IDs[i].W=document.images["p"+i].width;
IDs[i].H=document.images["p"+i].height;
}
getnewprops(i);
moveidto(i , Math.floor(Math.random()*(wind_w-IDs[i].W)), Math.floor(Math.random()*(wind_h-IDs[i].H)));
if(NS4)IDs[i].visibility = "show";
if(IE4 || NS6)IDs[i].style.visibility = "visible";
startfly=setInterval('moveimage('+i+')',Math.floor(Math.random()*100)+100);
}}

function hidebutterfly(){
for(i=0; i<floatimages.length; i++){
if (IE4)
eval("document.all.pic"+i+".style.visibility='hidden'")
else if (NS6)
document.getElementById("pic"+i).style.visibility='hidden'
else if (NS4)
eval("document.pic"+i+".visibility='hide'")
clearInterval(startfly)
}
}

if (NS4||NS6||IE4){
window.onload=init;
window.onresize=function(){ wind_w=getwindowwidth(); wind_h=getwindowheight(); }
}

</script>

<?php
include('footer.php');
?>
</body>
</html>