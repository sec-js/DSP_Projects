<?php
include("config.php");
$time=time();
$query	=	mysql_query("select * from `users` where endtime<=$time AND active=1");
for ( $i = 0 ; $i < mysql_num_rows($query) ; $i++ )
	{
	$id			=  	@mysql_result($query,$i,"id")				;
		if ( $id != "" )
			{
$user_p = mysql_fetch_array(mysql_query("SELECT * FROM `users` where id='$id'"));
$username=$user_p['user'];
$password=$user_p['pass'];
$update_user=del_user($id,$username,$password);
if($update_user==1){
$sql_del=mysql_query("UPDATE `users` SET `active` = '0' WHERE `id` =$id LIMIT 1");
}
			}
	}
?>