<?php 
session_start();
include "dbh.php";
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}

$uid=$_SESSION["uid"];
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);
if(trim($msg) != '') {
    $sql="INSERT INTO posts(uid, msg, gid) VALUES ('$uid', '$msg', '0')";
    $result = mysqli_query($conn, $sql);
    //echo mysqli_errno($conn) . ": " . mysqli_error($conn);
}
?>