<?php
	include "dbh.php";
	$sql = "SELECT * FROM `posts` ORDER BY date ASC";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
	    $sql2 = "SELECT username FROM signup WHERE uid='$row[uid]'";
	    $result2 = mysqli_query($conn, $sql2);
	    $row2 =  mysqli_fetch_assoc($result2);
	    $sender =  htmlspecialchars($row2['username'], ENT_QUOTES, 'UTF-8');
	    $msg =  htmlspecialchars($row['msg'], ENT_QUOTES, 'UTF-8');
	    echo "<p><b>$sender</b><br>$msg</p>";
	}   
?>