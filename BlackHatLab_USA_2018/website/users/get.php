<?php include("../functions.php"); ?>
<Html>
<Meta Http-equiv="Refresh" Content="15; URL=<?php echo $MyPath."users/get.php?name=".$name; ?>">
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
$rep=opendir('.');
while ($file = readdir($rep)) {
	if($file != '..' && $file !='.' && $file !='' && $file !='get.php'){ 
	 $howold=time() - fileatime("../myroom/".$file); 
	 //echo "howold".$howold;
	  if($howold>600){unlink($file);unlink("../myroom/".$file);}
	  	?><? echo $file ?></a><br><?		
	}
}
closedir($rep);
clearstatcache();
?>
</body>
</HTML>
