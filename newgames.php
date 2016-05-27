<p>Test your Response time!</p>
Click on "Start" first, and wait until the background color changes. As soon as it changes, hit "stop!"

<script language="JavaScript">
<!--

//Reflext Tester- By Andy Scott (based on script by Jasper van Zandbeek)
//http://www.geocities.com/SiliconValley/Station/4320/
//Submitted to Dynamic Drive for inclusion
//Visit http://www.dynamicdrive.com for this script

var startTime=new Date();
var endTime=new Date();
var startPressed=false;
var bgChangeStarted=false;
var maxWait=20;
var timerID;


var colors=new Array("tomato","chocolate","limegreen","crimson","darkslategray",
"aliceblue","mediumslateblue","cornflowerblue","darkorchid","darkkhaki","coral",
"darkolivegreen","cadetblue")

if (document.all||document.getElementById)
document.write('<div id="reflex" style="width:135px;height:135px;border:1px solid black" onClick="stopTest()"></div>')

function startTest()
{
        if (document.all)
        document.all.reflex.style.backgroundColor=colors[Math.floor(Math.random()*colors.length)];
        else if (document.getElementById)
	document.getElementById("reflex").style.backgroundColor=colors[Math.floor(Math.random()*colors.length)];
        else if (document.layers)
        document.reflexns.document.reflexns_sub.document.bgColor=colors[Math.floor(Math.random()*colors.length)];
	bgChangeStarted=true;
	startTime=new Date();
}

function remark(responseTime)
{
	var responseString="";
	if (responseTime < 0.10)
		responseString="Well done!";
	if (responseTime >= 0.10 && responseTime < 0.20)
		responseString="Nice!";
	if (responseTime >=0.20 && responseTime < 0.30)
		responseString="Could be better...";
	if (responseTime >=0.30 && responseTime < 0.60)
		responseString="Keep practising!";
	if (responseTime >=0.60 && responseTime < 1)
		responseString="Have you been drinking?";
	if (responseTime >=1)
		responseString="Did you fall asleep?";

	return responseString;
}

function stopTest()
{
	if(bgChangeStarted)
	{
		endTime=new Date();
		var responseTime=(endTime.getTime()-startTime.getTime())/1000;
                if (document.all)
		document.all.reflex.style.backgroundColor="white";
                else if (document.getElementById)
		document.getElementById("reflex").style.backgroundColor="white";
                else if (document.layers)
                document.reflexns.document.reflexns_sub.document.bgColor="white";      
		alert("Your response time is: " + responseTime + " seconds " + "\n" + remark(responseTime));
		startPressed=false;
		bgChangeStarted=false;
	}
	else
	{
		if (!startPressed)
		{
			alert("press start first to start test");
		}
		else
		{       
			clearTimeout(timerID);
			startPressed=false;             
			alert("cheater! you pressed too early!");
		}               
	}
}

var randMULTIPLIER=0x015a4e35;
var randINCREMENT=1;
var today=new Date();
var randSeed=today.getSeconds();
function randNumber()
{
	randSeed = (randMULTIPLIER * randSeed + randINCREMENT) % (1 << 31);
	return((randSeed >> 15) & 0x7fff) / 32767;
}

function startit()
{
	if(startPressed)
	{
		alert("Already started. Press stop to stop");
		return;
	}
	else
	{
		startPressed=true; 
		timerID=setTimeout('startTest()', 6000*randNumber());
	}
}
// --> 
</script>
<br>


<ilayer id="reflexns" width=135; height=135;><layer id="reflexns_sub" width=135; height=135; left=0 top=0 bgColor=yellow></layer></ilayer>

<form name="response">

<input type="button" value="  start  " onClick="startit()" style="font-weight:bold">
<input type="button" value="  stop  " onClick="stopTest()" style="font-weight:bold">
</form>