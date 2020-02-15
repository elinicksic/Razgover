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

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://kit.fontawesome.com/9db408b211.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="stylesheet.css">
        <script type="text/javascript" src="JavaScript/Login.js"></script>
    </head>

    <body>
            <div id="topnav">
                <h1>Razgover Login</h1>
            </div>
            <div id="info">
		        <form action="javascript:tryLogin($('#username').val(), $('#password').val());" id="loginForm">
		        	<div class="input-group mb-3">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </span>
                        <input id="username" type="text" class="form-control" name="uname" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input id="password" type="password" class="form-control" name="pass" placeholder="Password">
    				</div>
    				<button class="btn btn-primary" type="submit"><b>Login</b></button>
		        </form>
                <p>Don't have an account yet? Click <a href="signup.php">here</a> to create one!</p>
	        </div>
            <div id="alerts"></div>
    </body>
</html>
