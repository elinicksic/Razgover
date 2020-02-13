<!DOCTYPE html>
<html>
	<?php
		session_start();
		if(isset($_SESSION['uid'])){
			header("location:home.php");
		}


	?>
    <head>
        <title>Login to Razgover</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div id="main">
            <div id="info">
		        <h2>Login</h2>
		        <form action="include/login.inc.php" method="post">
		            <!--<label><b>Username</b><label>
		            <input type="text" name="uname" placeholder="Username"><br><br>
		            <label><b>Password</b><label>
		            <input type="password" name="pass" placeholder="Password"><br><br>
		            -->
		        	<div class="input-group">
      						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      						<input id="username" type="text" class="form-control" name="uname" placeholder="Username">
    				</div>
    				<div class="input-group">
     						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
     						<input id="password" type="password" class="form-control" name="pass" placeholder="Password">
    				</div>
    				<button class="btn btn-primary" type="submit"><b>Login</b></button>
		        </form>
                <p>Don't have an account yet? Click <a href="signup.php">here</a> to create one!</p>
	        </div>
        </div>
    </body>
</html>
