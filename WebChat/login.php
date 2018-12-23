<?php
session_start();
include "dbh.php";

$sql="SELECT * FROM signup WHERE username='$uname' AND password='$pass'";

$uname=mysqli_real_escape_string($conn, $_POST["uname"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);


$result=$conn->query($sql);

if(!$row = $result->fetch_assoc()){
	header("Location:error.php");

} else {
	$_SESSION["name"]=$_POST["uname"];

	header("Location:home.php");
}
?>