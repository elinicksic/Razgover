<?php

include "dbh.php";
$uname==mysqli_real_escape_string($_POST["uname"]);
$email=mysqli_real_escape_string($_POST["email"]);
$pass==mysqli_real_escape_string(password_hash($_POST["pass"], PASSWORD_BCRYPT));
$sql="SELECT * FROM signup WHERE email='$email' OR username='$uname'";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);

if(!row){
	header("Location:verify.php");
} else {
	header("Location:error.php");
}

?>