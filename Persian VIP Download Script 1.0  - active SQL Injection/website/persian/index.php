<?php
session_start();
ob_start();
include("config.php");
if (isset($_GET['p']) && $_GET['p'] == "login") {
$username=$_POST['username'];
$password=$_POST['password'];

$login_user = mysql_fetch_array(mysql_query("SELECT * FROM `users` where `user`='$username'"));
$username_check=$login_user['user'];
$password_check=$login_user['pass'];
error_log("use3r");
error_log($username);
error_log("pass");
error_log($password);
error_log("password check");
error_log($password_check);
error_log($_SESSION['img']==$_POST['security']);

if($_SESSION['img']==$_POST['security'])
{
  error_log("img");
  error_log(!$password);
  error_log($username);
  error_log(!$username);
  error_log(!$username || !$password);
if(!$username || !$password)
{
  $error="<p align=right><font color='#FF0000' face='Tahoma' style='font-size: 8pt'>لطفا تمامي فيل ها را كامل كنيد.</font></p>";

}else{
  error_log("SONO QUI");

	if ($username == $username_check || $password==$password_check) {

$_SESSION["resller_on"]="true";
$_SESSION["resller_username"]=$username_check;
$_SESSION["resller_password"]=$password_check;
if($username_check=="admin")
{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= admin.php">
HTML;
}else{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= user.php">
HTML;
}
   } else {

      $error= "<p align=right><font color='#FF0000' face='Tahoma' style='font-size: 8pt'>&#1605;&#1578;&#1575;&#1587;&#1601;&#1575;&#1606;&#1607; &#1705;&#1604;&#1605;&#1607; &#1593;&#1576;&#1608;&#1585; / &#1606;&#1575;&#1605; &#1705;&#1575;&#1585;&#1576;&#1585;&#1740; &#1588;&#1605;&#1575; &#1605;&#1580;&#1575;&#1586; &#1606;&#1740;&#1587;&#1578;</font></p>";

   }
}
}else{
  $error="<p align=right><font color='#FF0000' face='Tahoma' style='font-size: 8pt'>كد امنيتي اشباه است.</font></p>";
}
}
if ($_SESSION["resller_on"] == "true") {
if(check()=="user_1")
{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= user.php">
HTML;
}else if(check()=="admin_1")
{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= admin.php">
HTML;
}
 }else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>ورود</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if lte IE 8]>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->

</head>
<body>

<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_12">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="#">مدیریت سایت</a>
		</div>
	</div>
</header>

<div id="login" class="box">
	<h2>ورود به مدیریت</h2>
	<section>
		
		<form action="?p=login" method="post">
			<dl>
				<dt><label for="username">نام کاربری</label></dt>
				<dd><input id="username" name="username" type="text" /></dd>
			
				<dt><label for="adminpassword">رمز عبور</label></dt>
				<dd><input name="password" id="adminpassword" type="password" /></dd>
				
				<dt><label for="sec">کد امنیتی</label></dt>
				<dd><img id="sec" border="0" src="img/img.php" />
                <a href="#" onClick="document.getElementById('sec').src = 'img/img.php?id='+randnumber(); return false"><img src="images/refresh.png" width="20" height="20"/></a>
                </dd>
				
				<dt><label for="secnum">کد امنیتی را در کادر پایین وارد نمایید</label></dt>
				<dd><input name="security" id="secnum" type="text" /></dd>
			</dl>
			
			<p>
				<button type="submit" name="login" class="button gray" id="loginbtn">ورود</button>
				<button type="reset" name="reset" class="button red" id="loginbtn">انصراف</button>
				
			</p>
<?php
echo $error;
$error='';
?>
			<p>آی پی شما <?php echo $_SERVER['REMOTE_ADDR'];?> می باشد. تمامی اطلاعات شما در سایت ذخیره خواهد شد</p>
		</form>
	</section>
	
</div>

</body>

</html>
<?php }?>
