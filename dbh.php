<?php

$conn=mysqli_connect("localhost", "root", "", "webchat");
if(!$conn){
	die("connection failed".mysqli_connect_error());
}

?>