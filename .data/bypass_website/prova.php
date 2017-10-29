<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1> Access to your secrets! </h1>
<form  action='private.php' method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" id="pwd">
  </div>
  <input type="submit" class="btn btn-success" value="Go in Private Area!">
</form>
</div>

</body>
</html>



