<!DOCTYPE html>
<html lang="en">
<head>
  <title>Private</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Private area</h1>
</div>

<?php 
function assertArr($array, $names) {
  foreach($names as $n) {
    if (!isset($array[$n]))
      return false;
  }
  return true;
}
$creditCard = '4023402340234023';

?>

<?php

if (!assertArr($_POST, ['name', 'pwd']))
  echo 'MISSING name or pwd parameter';
else if ($_POST['name'] !== 'administrator') 
  echo 'No correct name';
else if ($_POST['pwd'] !== 'administrator') { 
  echo 'No correct password!';
}
else echo '<h3>Your secret card is  ' . $creditCard . '</h3>';

?>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

</body>
</html>



