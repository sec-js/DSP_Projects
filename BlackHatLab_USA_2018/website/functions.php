<?php
$MyPath="http://172.19.0.2:12345/";
$name = $_REQUEST["name"];
$msg = $_REQUEST["msg"];

Function FilterText($ReplyText){	
$ReplyText = htmlspecialchars($ReplyText);
$ReplyText = nl2br($ReplyText);
$ReplyText = str_replace(" ;b ","<img src=images/01.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :p ","<img src=images/02.gif border=0>",$ReplyText);
$ReplyText = str_replace(" 8o ","<img src=images/03.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :( ","<img src=images/04.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :j ","<img src=images/05.gif border=0>",$ReplyText);
$ReplyText = str_replace(" -- ","<img src=images/06.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ++ ","<img src=images/07.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :D ","<img src=images/08.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;( ","<img src=images/09.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :! ","<img src=images/10.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :? ","<img src=images/11.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;! ","<img src=images/12.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :d ","<img src=images/13.gif border=0>",$ReplyText);
$ReplyText = str_replace(" 8I ","<img src=images/14.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;? ","<img src=images/15.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :O ","<img src=images/16.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;- ","<img src=images/17.gif border=0>",$ReplyText);
$ReplyText = str_replace(" :) ","<img src=images/18.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;D ","<img src=images/19.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;b ","<img src=images/20.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;I ","<img src=images/21.gif border=0>",$ReplyText);
$ReplyText = str_replace(" ;s ","<img src=images/22.gif border=0>",$ReplyText);
$ReplyText = eregi_replace("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])","<A HREF=\"\\1://\\2\\3\" TARGET=\"_blank\">\\1://\\2\\3</A>",$ReplyText);
$ReplyText = eregi_replace("(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)([[:alnum:]-])\.([^[:space:]]*)([[:alnum:]-]))","<a href=\"mailto:\\1\">\\1</a>",$ReplyText);
return $ReplyText;
}

Function WriteMyFile($nom,$contenu){ 
$fp = fopen($nom, "w");
$r = fwrite($fp, "$contenu"); 
fclose($fp); 
}

Function ReadMyFile($nom){
$max=22;
$fcontents = file($nom);
$lines=count($fcontents);
if ($lines<$max){$startline=0;}else{$startline=$lines-$max;}
for ($i = 0; $i <= $max; $i++) {$contenu .= $fcontents[$i+$startline];}
return $contenu; 
}

Function GetMyRoom($nom){
if (file_exists ("myroom/".$nom)){
return "rooms/".ReadMyFile("myroom/".$nom);
}else{
return "rooms/DISCONNECTED";
}
}

Function GetRoom($nom){
if (file_exists ("../myroom/".$nom)){
return "../rooms/".ReadMyFile("../myroom/".$nom);
}else{
return "../rooms/DISCONNECTED";
}
}

?>
