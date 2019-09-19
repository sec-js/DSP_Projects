<?php
include_once("utils.php");
$hashes = getHashes();
$form_one = $hashes['hashone'];
$form_two = $hashes['hashtwo'];
$congratulation = "";

$ok = "<h1> Great! </h1>";
$ok_one = "";
$ok_two = "";

/* writeOne(""); */

if (!empty($_POST["firsthash"])) {
  $first = $_POST["firsthash"];
  if (checkOne($first)) {
   writeOne($first);
   $form_one = $first;
   $ok_one = $ok;
  }
}

if (!empty($_POST["secondhash"])) {
  $second = $_POST["secondhash"];
  if (checkTwo($second)) {
       writeTwo($second);
       $form_two = $second;
      $ok_two = $ok;
    }
  }
if (checkOne($form_one) && checkTwo($form_two)) {
  $congratulation = "<a href='verygoodmario/' > <h1>You WIN! Click Me ! </h1></a>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Black Hat | Home</title>
	<!-- BLACKHATINCLUDE | sourceStart_common-header -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/screen.css" type="text/css" />
	<link rel="stylesheet" href="css/grid.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/superfooter-2015b.css" type="text/css" />
	<link rel="shortcut icon" href="images/favicon2.ico" type="image/ico" />

	<!-- BLACKHATINCLUDE | sourceEnd_common-header -->

<!-- BLACKHATINCLUDE | sourceStart_common-secondary-header -->
	<meta name="robots" content="noodp">
    <meta property="og:title" content="Black Hat" >
	<meta property="og:description" content="Black Hat is the most technical and relevant global information security event series in the world. These high-profile global events and Trainings are driven by the needs of the security community, striving to bring together the best minds in the industry." >
	<meta property="og:image" content="images/logo-2018.png">
    <link rel="stylesheet" href="css/cssmenu.2018.css" type="text/css" />
    <link rel="stylesheet" href="css/trainings-2018.css" type="text/css" />
    <link rel="stylesheet" href="css/style-2018.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="css/green.css" type="text/css" />
    <script type="text/javascript" src="js/icheck.min.js"></script>
    
	<!-- BLACKHATINCLUDE | sourceEnd_common-secondary-header -->
<!-- BLACKHATINCLUDE | sourceStart_common-slideshow-header -->
    <script type="text/javascript" src="js/jquery.slides.min.js"></script>
    <script type="text/javascript" src="js/slides.init.js"></script>
    <link rel="stylesheet" href="css/slideshow-2018.css" type="text/css" />
</head>
<script>
  window.onload = function() {
    var hashone = document.getElementById('hashone');
    var hashbuttonone = document.getElementById('hashbuttonone');
    var hashtwo = document.getElementById('hashtwo');
    var hashbuttontwo = document.getElementById('hashbuttontwo');
    if (hashone.value) {
        hashone.disabled = true;
        hashbuttonone.disabled = true;
    }
    if (hashtwo.value) {
        hashtwo.disabled = true;
        hashbuttontwo.disabled = true;
    }
  }

</script>
<body>
	<div class="header">
		<div style="position:absolute; left: 1000px;" id="header-logo-mission">
			<a id="logo" href="/index.html"><img src="images/page-graphics-17/logo.png" alt="Black Hat Home" /></a>
		</div>
	</div>
	<div class="container">
		<div class="span-18 main-content">
      <br>
      <br>
      <br>
      <br>
      <br>
        <p> 
        <h1> 
            Good! Insert hashes ;-)
       </h1>
    <br>
        <form method="POST" action="youcannotfindme.php">
          Machine One:<br>
          <input type="text" id="hashone" name="firsthash" value="<?php echo $form_one?>">
          <input type="submit" id="hashbuttonone"  value="Send">
          <div id="success_one">
            <br>
            <?php echo $ok_one; ?> 
          </div>
      </form>
          <br>
          <br>
        <form method="POST" action="youcannotfindme.php">
          Machine Two:<br>
          <input type="text" id="hashtwo" name="secondhash" value="<?php echo $form_two?>">
          <input type="submit" id="hashbuttontwo" value="Send">
          <div id="success_two">
            <br>
            <?php echo $ok_two; ?> 
          </div>
          <br><br>
        </form>
        <?php echo $congratulation; ?>
      </p>
    </div>
  </div>
</body>
</html>
