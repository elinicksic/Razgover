<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['uid'])){
        header("location:home.php");
    }
?>
<html>
    <head>
        <title>Razgover - Login</title>
        <link rel="stylesheet" href="stylesheets/global.css">
        <link rel="stylesheet" href="stylesheets/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" />
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="main">
            <div id="info">
		        <h2>Login</h2>
		        <form action="login.php" method="post">
		        	<div class="input-group">
      					<span class="input-group-addon"><i class="glyphicon glyphicon-user" /></span>
      					<input id="username" type="text" class="form-control" name="uname" placeholder="Username">
    				</div>
    				<div class="input-group">
     					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"> /></span>
     					<input id="password" type="password" class="form-control" name="pass" placeholder="Password">
    				</div>
    				<button class="btn btn-primary" type="submit"><b>Login</b></button>
		        </form>
		        <form action="signup.php" method="post">
		            <h2>Sign Up</h2>
		            <!--<label><b>Username</b></label>
		            <input type="text" name="uname" placeholder="Username"><br><br>
		            <label><b>Password</b></label>
            		<input type="password" name="pass" placeholder="Password"><br><br>
            		<label><b>Email</b></label>
            		<input type="email" name="email" placeholder="example@domain.com"><br><br>-->
            		<div class="input-group">
      					<span class="input-group-addon"><i class="glyphicon glyphicon-user" /></span>
      					<input id="username" type="text" class="form-control" name="uname" placeholder="Username">
    				</div>
    				<div class="input-group">
     					<span class="input-group-addon"><i class="glyphicon glyphicon-lock" /></span>
     					<input id="password" type="password" class="form-control" name="pass" placeholder="Password">
    				</div>
    				<div class="input-group">
     					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" /></span>
     					<input id="email" type="email" class="form-control" name="email" placeholder="Email">
    				</div>
            		<button class="btn btn-primary" type="submit"><b>Sign Up</b></button>
		        </form>
	        </div>
        </div>
    </body>
</html>