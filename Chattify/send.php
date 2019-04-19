<?php 
session_start();
include "dbh.php";
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}

$uid=$_SESSION["uid"];
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);
$gid=mysqli_real_escape_string($conn, $_POST["gid"]);
if(trim($msg) != '') {
    $sql="INSERT INTO posts(uid, msg, gid) VALUES ('$uid', '$msg', '$gid')";
    $result = mysqli_query($conn, $sql);
    //echo mysqli_errno($conn) . ": " . mysqli_error($conn);
}
?>