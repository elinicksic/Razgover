<?php
session_start();
include "dbh.php";

$uname=mysqli_real_escape_string($conn, $_POST["uname"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);


$sql="SELECT * FROM signup WHERE username='$uname'";

$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

if(!password_verify($pass, $row["password"])){
	echo("Username or password is incorrect!");
} else {
	$_SESSION["uid"]=$row["uid"];
}

