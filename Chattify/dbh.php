<?php

$conn=mysqli_connect("localhost", "root", "", "webchatgroup");
if(!$conn){
	die("connection failed".mysqli_connect_error());
}

?>