<?php
session_start();
if (!isset($_SESSION["uid"])) {
    header("Location:error.php");
}
include "dbh.php";

$uid=$_SESSION["uid"];
$name=mysqli_real_escape_string($conn, $_POST["name"]);
if(trim($name) == ""){
	$name = "Unnamed Group";
}
$users=mysqli_real_escape_string($conn, $_POST['people']);
$usersarray = explode(",", $users);
$sql="INSERT INTO groups(creator, name) VALUES ('$uid', '$name')";
$result = mysqli_query($conn, $sql);
$affected = mysqli_affected_rows($conn);
if($affected > 0) {
    $gid = mysqli_insert_id($conn);
    $sql = "INSERT INTO usertogroup(uid, gid) VALUES ('$uid', '$gid')";
    $result = mysqli_query($conn, $sql);
    foreach ($usersarray as $value) {
        $cleanvalue = mysqli_real_escape_string($conn, $value);
        if (trim($cleanvalue) != "") {
            $sql = "SELECT * FROM signup WHERE username='$cleanvalue'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['uid'] != "") {
                $sql = "INSERT INTO usertogroup(uid, gid) VALUES ('$row[uid]', '$gid')";
                $result = mysqli_query($conn, $sql);
            }
        }
    }
}


