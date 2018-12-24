<?php 
include "dbh.php";
$sql="SELECT * FROM posts WHERE uid='$uid' AND date='$date' AND msg='$msg'";

$uid=setcookie("uid")
$date=mysqli_real_escape_string($conn, $_POST["uname"]);
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);


?>