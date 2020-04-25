<?php include("functions.php"); ?>
<Html><Meta Http-equiv="Refresh" Content="5; URL=<?php echo $MyPath."refresh.php?name=$name"; ?>"><Head><title>KikChat</title>
<style type="text/css">
<!--
A {COLOR: #FFFFFF; FONT-SIZE: 10pt; TEXT-DECORATION: none}
A:hover {COLOR: #FFFF00}
BODY {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
-->
</style>
<script language="JavaScript">function ScrollDown(){parent.MSGS.scrollTo(0,400)}</script>
</HEAD><body onload="ScrollDown()"bgcolor="#000066" leftmargin="2" topmargin="2">
<?php 
$ROOM=GetMyRoom($name);
if($msg!="" && file_exists ("myroom/".$name)){
WriteMyFile($ROOM,ReadMyFile($ROOM)."<b>[".FilterText($name)."]</b> ".FilterText(stripslashes($msg))."<BR>\n");
WriteMyFile("myroom/".$name,ReadMyFile("myroom/".$name))
?><script language="JavaScript">parent.send.msg.value="";</script><?
}
include($ROOM); 
?>
</body></HTML>