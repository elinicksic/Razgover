<?php

$conn=mysqli_connect("73.32.192.74", "root", "", "webchat");
//$conn=mysqli_connect("localhost", "root", "", "webchat");
if(!$conn){
	die("connection failed".mysqli_connect_error());
}

?>