<DOCTYPE html>
    <?php
    session_start();
    if(isset($_SESSION['uid'])){
        header("location:home.php");
    }
    ?>
    <html>
        <title>Razgover - Signup</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet.css">
        <script type="text/javascript" src="JavaScript/Signup.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <head>
    </head>
    <body>
    <form action="javascript:trySignup($('#username').val(), $('#password').val(), $('#password-conf').val(), $('#email').val());">
        <h2>Sign Up</h2>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="uname" placeholder="Username">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="pass" placeholder="Password">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password-conf" type="password" class="form-control" name="pass-conf" placeholder="Retype Password">
        </div>
        <br>
        <button class="btn btn-primary" type="submit"><b>Sign Up</b></button>
    </form>
    <p>Already have an account? Click <a href="login.php">here</a> to login</p>
    <div id="alerts">
    </div>
    </body>
    </html>