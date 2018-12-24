<?php

include "dbh.php";
$uname=$_POST["uname"];
$email=$_POST["email"];
$pass=password_hash($_POST["pass"], PASSWORD_BCRYPT);


$sql="INSERT INTO signup(username,email,password) VALUES ('$uname', '$email', '$pass')";
$result=$conn->query($sql);


header("Location:index.php");
?>