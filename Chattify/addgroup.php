<?php
session_start();
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}
include "dbh.php";

$uid=$_SESSION["uid"];
$name=mysqli_real_escape_string($conn, $_POST["name"]);
$users=mysqli_real_escape_string($conn, $_POST["people"]);
$sql="INSERT INTO groups(creator, name) VALUES ('$uid', '$name')";
$result=mysqli_query($conn, $sql);
$gid=mysqli_insert_id($conn);
$sql="INSERT INTO usertogroup(uid, gid) VALUES ('$uid', '$gid')";
$result=mysqli_query($conn, $sql);



?>