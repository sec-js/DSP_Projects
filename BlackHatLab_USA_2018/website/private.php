<Html><Meta Http-equiv="Refresh" Content="600; URL=<?php echo $MyPath."private.php?name=$name"; ?>">
<Head><title>KikChat</title><style type="text/css">
<!--
A {COLOR: #FFFFFF; FONT-SIZE: 10pt; TEXT-DECORATION: none}
A:hover {COLOR: #FFFF00}
BODY {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
-->
</style>
<script language="JavaScript">
function ScrollDown(){
parent.PMSG.scrollTo(0,400)
}
</script>
</HEAD><body onload="ScrollDown()"bgcolor="#000066" leftmargin="2" topmargin="2">
<?php 
include("functions.php");
$ROOM="users/".$name;
if($msg!=""){
	WriteMyFile($ROOM,ReadMyFile($ROOM)."<b>[".FilterText($name)."]</b> ".FilterText(stripslashes($msg))."<BR>\n");
}
include($ROOM); 
?>
</body></HTML>