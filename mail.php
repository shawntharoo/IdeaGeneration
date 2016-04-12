<?php
$to = "mr.stadikaram@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: sandakelumtharindu1994@gmail.com \r\n";
$result = mail($to,$subject,$txt,$headers);
if($result == true){
echo "success";
}else{
	echo "error";
}
?>