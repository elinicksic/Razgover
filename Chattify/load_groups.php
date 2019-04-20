<?php
    session_start();
    if (!isset($_SESSION["uid"])) {
        header("Location:index.php");
    }
	include "dbh.php";
    $uid = $_SESSION['uid'];
	$sql = "SELECT * FROM usertogroup WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
    echo "<a onclick='newgroup();' id='creategroup'>Create a new group</a><br>";
	while($row = mysqli_fetch_assoc($result)){
        $sql2 = "SELECT * FROM groups WHERE gid='$row[gid]'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
	    $groupname =  htmlspecialchars($row2['name'], ENT_QUOTES, 'UTF-8');
        $gid = $row2['gid'];
	    echo "<a onclick='changegroup($gid);'><b>$groupname</b></a><br>";
	}   
?>