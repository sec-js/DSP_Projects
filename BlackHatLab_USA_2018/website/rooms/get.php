<Html>
<Head><title>KikChat</title>
<style type="text/css">
<!--
A {COLOR: #FFFFFF; FONT-SIZE: 10pt; TEXT-DECORATION: none}
A:hover {COLOR: #FFFF00}
BODY {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
-->
</style>
</HEAD><body bgcolor="#000066" leftmargin="2" topmargin="2">
<?php
include("../functions.php");
if($ROOM!=""){WriteMyFile("../myroom/".$name,$ROOM);}
$MeThere=GetRoom($name);
$rep=opendir('.');
while ($file = readdir($rep)) {
	if($file != '..' && $file !='.' && $file !='' && $file !='get.php' && $file !='DISCONNECTED'){ 
	    if("../rooms/".$file==$MeThere){	
	  	?><a href="get.php?ROOM=<? echo $file; ?>&name=<? echo $name; ?>" target="ROOMS"><b><? echo $file; ?></b></a><br><?		
	    }else{
		?><a href="get.php?ROOM=<? echo $file; ?>&name=<? echo $name; ?>" target="ROOMS"><? echo $file; ?></a><br><?			
	    }	  	
	}
}	
closedir($rep);
clearstatcache();
?>
</body>
</HTML>