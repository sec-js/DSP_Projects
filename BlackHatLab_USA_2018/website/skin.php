<?php
include("functions.php");
WriteMyFile("users/".$name,"");
WriteMyFile("myroom/".$name,"HALL");
WriteMyFile("rooms/HALL",ReadMyFile("rooms/HALL").date("<b>H:i ").FilterText($name)."</b> entre sur le chat<br>\n");
?>
<html><head><title>kikchat</title>
<!--
/***************************************
 *KikChat  -  Kik it Productions       *
 *copyright : © 2001 Frederick Lemasson*
 *email     : kikchat@kik-it.com       *
 *url       : http://www.kik-it.com    *
 ***************************************/
-->
<META NAME="Author" CONTENT="Fredy (Kik it Productions)">
<META NAME="Description" CONTENT="KikChat © Kik it Productions.">
<META NAME="Keywords" LANG="fr" CONTENT="KikChat, Chat,¨PHP">
<META NAME="Identifier-URL" CONTENT="http://www.kik-it.com">
<META NAME="Robots" CONTENT="index,follow,all">
<META NAME="revisit-after" CONTENT="7 days">
<META NAME="Reply-to" CONTENT="webmaster@kik-it.com">
<META NAME="Category" CONTENT="Internet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
A {COLOR: #FFFFFF; FONT-SIZE: 10pt; TEXT-DECORATION: none}
A:hover {COLOR: #FFFF00}
BODY {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
TABLE {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
TD {COLOR: #FFFFFF; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 10pt}
.MyTEXT {font-family : Verdana, Geneva;font-size : 8pt;color : #ffffff;background-color : #000066;}
-->
</style>
<script language="JavaScript1.2">
function AddSmiley(zoop){
document.send.msg.value=document.send.msg.value + zoop
document.send.msg.focus();
}</script>
</head><body bgcolor="#FFFFFF" text="#000000" background="images/bg.gif">
<center>
<form name="send" method="post" action="refresh.php?name=<?php echo $name; ?>" target="MSGS">

<table width="708" cellspacing="0" cellpadding="2" border="1" bordercolor="#000099" bordercolorlight="#0000CC" bordercolordark="#000066" bgcolor="#000099">
<tr bordercolor="#000099"><td align="left"><table border="0" cellspacing="0" cellpadding="0">
<tr><td><IFRAME name=MSGS ID=IFrame1 width="575" height="475" FRAMEBORDER=1 SCROLLING=YES SRC="refresh.php?name=<?php echo $name; ?>"></IFRAME>
        <IFRAME name=PMSG ID=IFrame2 width="575" height="0" FRAMEBORDER=1 SCROLLING=YES SRC="private.php?name=<?php echo $name; ?>"></IFRAME></td>
    <td><IFRAME name=USERS ID=IFrame3 width="125" height="325" FRAMEBORDER=1 SCROLLING=YES SRC="users/get.php?name=<?php echo $name; ?>"></IFRAME>
        <IFRAME name=ROOMS ID=IFrame4 width="125" height="150" FRAMEBORDER=1 SCROLLING=YES SRC="rooms/get.php?name=<?php echo $name; ?>"></IFRAME></td>
</tr></table></td></tr></table>

<input type="hidden" name="name" value="<?php echo $name; ?>">
<table width="708" border="1" bordercolor="#000099" bordercolorlight="#0000CC" bordercolordark="#000066" bgcolor="#000099" cellpadding="0" cellspacing="0">
<tr bordercolor="#000099"><td align="center"><input type="text" name="msg" size="100"><script language="JavaScript">document.send.msg.focus();</script></td></tr>
</table>
<table width="708" border="1" bordercolor="#000099" bordercolorlight="#0000CC" bordercolordark="#000066" bgcolor="#000099" cellpadding="0" cellspacing="0">
  <tr align="center" bordercolor="#000099">
    <td><a href="JavaScript:AddSmiley('  ;b  ')"><img src=images/01.gif border=0 alt=";b"></a></td>
    <td><a href="JavaScript:AddSmiley('  :p  ')"><img src=images/02.gif border=0 alt=":p"></a></td>
    <td><a href="JavaScript:AddSmiley('  8o  ')"><img src=images/03.gif border=0 alt="8o"></a></td>
    <td><a href="JavaScript:AddSmiley('  :(  ')"><img src=images/04.gif border=0 alt=":("></a></td>
    <td><a href="JavaScript:AddSmiley('  :j  ')"><img src=images/05.gif border=0 alt=":j"></a></td>
    <td><a href="JavaScript:AddSmiley('  --  ')"><img src=images/06.gif border=0 alt="--"></a></td>
    <td><a href="JavaScript:AddSmiley('  ++  ')"><img src=images/07.gif border=0 alt="++"></a></td>
    <td><a href="JavaScript:AddSmiley('  :D  ')"><img src=images/08.gif border=0 alt=":D"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;(  ')"><img src=images/09.gif border=0 alt=";("></a></td>
    <td><a href="JavaScript:AddSmiley('  :!  ')"><img src=images/10.gif border=0 alt=":!"></a></td>
    <td><a href="JavaScript:AddSmiley('  :?  ')"><img src=images/11.gif border=0 alt=":?"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;!  ')"><img src=images/12.gif border=0 alt=";!"></a></td>
    <td><a href="JavaScript:AddSmiley('  :d  ')"><img src=images/13.gif border=0 alt=":d"></a></td>
    <td><a href="JavaScript:AddSmiley('  8I  ')"><img src=images/14.gif border=0 alt="8I"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;?  ')"><img src=images/15.gif border=0 alt=";?"></a></td>
    <td><a href="JavaScript:AddSmiley('  :O  ')"><img src=images/16.gif border=0 alt=":O"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;-  ')"><img src=images/17.gif border=0 alt=";-"></a></td>
    <td><a href="JavaScript:AddSmiley('  :)  ')"><img src=images/18.gif border=0 alt=":)"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;D  ')"><img src=images/19.gif border=0 alt=";D"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;b  ')"><img src=images/20.gif border=0 alt=";b"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;I  ')"><img src=images/21.gif border=0 alt=";I"></a></td>
    <td><a href="JavaScript:AddSmiley('  ;s  ')"><img src=images/22.gif border=0 alt=";s"></a></td>
  </tr>
</table>
</center>
</form></body></html>