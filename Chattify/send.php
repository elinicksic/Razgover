<?php 
session_start();
include "dbh.php";
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}

$uid=$_SESSION["uid"];
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);
if(trim($msg) != '') {
    $sql="INSERT INTO posts(uid, msg) VALUES ('$uid', '$msg')";
    $result = mysqli_query($conn, $sql);
}

header("Location:home.php#input");
?>