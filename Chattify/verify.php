<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION["uid"])){
    header("Location:error.php");
}
include "dbh.php";

$sql="SELECT * FROM signup WHERE uid='$_SESSION[uid]'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$chrs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$code = '';
for ($i = 0; $i < 5; $i++) {
   $code = $chrs[rand(0, strlen($chrs))];
}

$message = "
<html>
<head>
<title>Verify your Razgover account!</title>
<head>
<body>
<h1>Hello Razgover user!</h1>
<h3>We just recieved a request for your account verification!<br>
If this was you, then your verification code is <b>$code</b>.
If this wasn't you, then please disregard this email.

Thank you!
~Razgover Team</p>
</body>
";
mail("$row[email]", "Verify your Razgover account", "$message");
?>
<html>
    <head>
    	<title>Razgover - Congrats!</title>
    	<link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        $sql="SELECT * FROM signup WHERE uid='$_SESSION[uid]'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);

        echo "
    	<fieldset>
    	    <legend>
    	        <center><h1>Congrats!</h1></center>
    	    </legend>
    	    You successfully created your account! Sadly, you need to verify your email. We sent a verification code to <b>$row[email]</b>. If you didn't recieve anything within a minute or so, then please check if you typed in your email correctly!<br>
    	    Be aware that if you close this page, you'll have to restart the signup.
    	</fieldset>
        ";

        ?>
    	<input type="text" placeholder="Enter the verification code" />
    </body>
</html>