<?php 
session_start();
if (!isset($_SESSION["uid"])) {
    header("Location:index.php");
}
include "dbh.php";


$uid=$_SESSION["uid"];
$msg=mysqli_real_escape_string($conn, $_POST["msg"]);
$gid=mysqli_real_escape_string($conn, $_POST["gid"]);
$sql2 = "SELECT * FROM usertogroup WHERE uid='$uid' AND gid='$gid'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$uidonfile = $row2['uid'];
$currentuid = $_SESSION['uid'];
if($uidonfile == $currentuid){ 
	if(trim($msg) != '') {
	    $sql="INSERT INTO posts(uid, msg, gid) VALUES ('$uid', '$msg', '$gid')";
	    $result = mysqli_query($conn, $sql);
	    //echo mysqli_errno($conn) . ": " . mysqli_error($conn);
	    echo(mysqli_error($conn));
	}
}
