<?php
@session_start();
@ob_start();
include("config.php");
if(check()!="admin_1")
{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= index.php">
HTML;
exit();
}
$edit_id=$_GET['edit'];
if($_POST['submit']=='go')
{
$username=$_POST['username'];
$password=$_POST['password'];
$cat=$_POST['cat'];
$cat_p = mysql_fetch_array(mysql_query("SELECT * FROM `cat` where id='$cat'"));
$cat_time=$cat_p['time'];
$user_p =  mysql_num_rows(mysql_query("SELECT * FROM `users` where `user`='$username'"));
$time=time();
if(!$username || !$password || !$cat)
$error='لطفا تمامی فیلد ها را کامل کنید';
else{
if(is_numeric($cat_time)){
if($user_p==0){
$endtime=$time + ($cat_time * 24 * 60 * 60);
$save_user=save_user($username,$password);
if($save_user==1){
$sqli = mysql_query("INSERT INTO `users` (`user`,`pass`,`time`,`endtime`,`cat`,`active` ) VALUES ('$username','$password','$time','$endtime','$cat','1')");
}
if($sqli)
$sus='اطلاعات با موفقیت ثبت شد';
else
$error='ثبت اطلاعات با مشکل روبرو شد!';
}else{
$error='این نام کاربری قبلا به ثبت رسیده !';
}
}else{
$error='لطفا به ویرایش دسته ها رفته و تاریخ "چند روزه" را به عدد وارد کنید !';
}
}

}else if($_POST['submit']=='update')
{
$username=$_POST['username'];
$password=$_POST['password'];
if(!$username || !$password)
$error='لطفا تمامی فیلد ها را کامل کنید';
else{
$update_user=update_user($edit_id,$username,$password);
if($update_user==1){
$sqli= mysql_query("UPDATE `users` SET `user` = '$username',`pass` = '$password' WHERE `id` =$edit_id LIMIT 1");
}
if($sqli)
$sus='اطلاعات با موفقیت ویرایش شد.';
else
$error='ویرایش اطلاعات با مشکل روبرو شد!';
}
}
if($edit_id)
{
$edit_cart = mysql_fetch_array(mysql_query("SELECT * FROM `users` where `id`='$edit_id'"));
if(!$edit_cart['id'])
{
echo <<<HTML
<meta http-equiv="refresh" content="0; url= cart_edit.php">
HTML;
}else{
$username=$edit_cart['user'];
$password=$edit_cart['pass'];
$submit='update';
}
}
if($error)
$status='<div class="error msg">'.$error.'</div>';
else if($sus)
$status='<div class="success msg">'.$sus.'</div>';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>ارسال اکانت جدید - پنل مدیریت</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/skins/red.css" title="gray">
<link rel="stylesheet" type="text/css" href="css/superfish.css">
<!--[if lte IE 8]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/selectivizr.js"></script>
<script type="text/javascript" src="js/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript" src="js/gen_validatorv4.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>


</head>
<body>



<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="#"><span>مديريت سايت</a>
			<a id="view-site" href="logout.php">خروج</a>
		</div>
		


		
	</div>
</header>


<section id="content">
	<section class="container_12 clearfix">
		<section id="main" class="grid_9">
			<article id="settings">
				<h1>ارسال اکانت جدید</h1>
				<?php echo $status;?>
				<form class="uniform" name="news" method="post" action="<?php if($submit)echo '?edit='.$edit_id;?>">
				<input type="hidden" name="go" value="">
			
					<dl>
						<dt><label for="newstitle">نام کاربری</label></dt>
						<dd><input type="text" value="<?php echo $username;?>" class="big" id="newstitle" name="username" dir="ltr"></dd>
						
						<dt><label for="newstitle">پسورد</label></dt>
						<dd><input type="text" value="<?php echo $password;?>" size="8" class="big" id="newstitle" name="password" dir="ltr"></dd>
						<?php if(!$submit)
						{?>
						<dt><label for="newstitle">نوع اکانت</label></dt>
						<dd><select size="1" name="cat" class="big">
<?php
$result = mysql_query("SELECT * FROM cat");
while($r=mysql_fetch_array($result))
{
$id=$r["id"];
$title=$r["title"];
echo <<<HTM
				<option value="$id">$title</option>
HTM;
}				
?>
</select><?php } ?>
						</dd>
					<p>
						<button class="button big" type="submit" value="<?php echo ($submit) ? $submit : 'go';?>" name="submit">ارســال</button>
						<button class="button white" type="button">لــغـو</button>
					</p>
				</form>
					<script language="JavaScript" type="text/javascript">
				 var frmvalidator  = new Validator("news");
				 frmvalidator.addValidation("username","req","نام کاربری را وارد کنید");
				 frmvalidator.addValidation("password","req","پسورد را کامل کنید");
				 frmvalidator.addValidation("cat","req","نوع اکانت را وارد کنید");
					

				 </script>
				
				
				
				
			</article>
		</section>
		
		<?php include('theme/sidebar.php');?>
		
	</section>
</section>

<footer id="bottom">
	<section class="container_12 clearfix">
		
		<div class="grid_6 alignright">
			تمامی حقوق متعلق به پرشین اسکریپت می باشد | پیاده سازی توسط 
			<font color="red">ZegerSot</font> 

		</div>
	</section>
</footer>

</body>

</html>