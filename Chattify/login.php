<?php
session_start();
include "dbh.php";

$uname=mysqli_real_escape_string($conn, $_POST["uname"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);


$sql="SELECT * FROM signup WHERE username='$uname'";

$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

if(!password_verify($pass, $row["password"])){
	header("Location:error.php");

} else {
	$_SESSION["name"]=$_POST["uname"];

	header("Location:home.php");
}
?>