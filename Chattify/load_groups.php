<?php
/*
    $sql="SELECT gid FROM usertogroup WHERE uid='$_SESSION[uid]'";
    $result=mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $sql2="SELECT * FROM groups WHERE gid='$row[gid]'";
        $result2=mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo "<p><b>$row2[name]</b></p>";
    }   */
	include "dbh.php";
	$sql = "SELECT * FROM `groups`";
	$result = mysqli_query($conn, $sql);
    echo "<a href='creategroup.php'>Create a new group</a>";
	while($row = mysqli_fetch_assoc($result)){
	    $groupname =  htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
	    echo "<p><b>$groupname</b></p>";
	}   
?>
