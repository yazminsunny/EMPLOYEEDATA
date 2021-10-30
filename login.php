<?php include('home.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Human Resource Management: Employee login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Human Resource Management: Employee login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		New employee? <a href="registration.php">Register</a>
  	</p>
  </form>
</body>
</html>
