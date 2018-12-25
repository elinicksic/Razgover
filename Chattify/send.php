<?php 
include "dbh.php";
if (!isset($_COOKIE["uid"])) {
    header("Location:error.php");
}


$uid=$_COOKIE["uid"];
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);
$sql="INSERT INTO posts(uid, msg) VALUES ('$uid', '$msg')";
$result = mysqli_query($conn, $sql);

header("Location:home.php");
?>