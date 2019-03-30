<?php 
session_start();
include "dbh.php";
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}

$uid=$_SESSION["uid"];
$msg=mysqli_real_escape_string($conn, htmlspecialchars($_POST["msg"], ENT_QUOTES, 'UTF-8'));
if(trim($msg) != '') {
    $sql="INSERT INTO posts(uid, msg) VALUES ('$uid', '$msg')";
    $result = mysqli_query($conn, $sql);
    //echo mysqli_errno($conn) . ": " . mysqli_error($conn);
}
header("Location:home.php#input");
?>