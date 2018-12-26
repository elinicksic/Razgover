<!DOCTYPE html>
<?php 
$chrs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$chrlen = strlen($chrs);
$code = 
for($i = 0; $i < $chrlen; $i++) {
	$randomString .= $characters[rand(0, $chrlen - 1)];
}
$message = "
<html>
<head>
<title>Verify your Chattify account!</title>
<head>
<body>
<h1>Hello Chattify user!</h1>
<h3>We just recieved a request for your account verification!<br>
If this was you, then your verification code is $code.
If this wasn't you, then please disregard this email.

Thank you
~Chattify Team</p>
</body>
"
mail(email,"Verify your Chattify account",$message);
?>
<html>
    <head>
    	<title>Chattify - Congrats!</title>
    	<link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
    	<fieldset>
    	    <legend>
    	        <center><h1>Congrats!</h1></center>
    	    </legend>
    	    You successfully created your account! Sadly, you need to verify it so people don't spam and overload our database. We sent a verification code to your email. If you didn't recieve anything within a minute or so, then please check if you typed in your email correctly!<br>
    	    Be aware that if you leave this page, you'll have to restart the signup to get another email.
    	</fieldset>
    	<input type="text" placeholder="Enter the verification code" />
    </body>
</html>