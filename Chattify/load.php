<?php
    include "dbh.php";
	session_start();
	if(!isset($_SESSION['uid'])) {
        header("location:index.php");
    }
	$gid = mysqli_real_escape_string($conn, $_POST['gid']);
	$sql3 = "SELECT * FROM usertogroup WHERE uid='$_SESSION[uid]' AND gid='$gid'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	$uidonfile = $row3['uid'];
	$currentuid = $_SESSION['uid'];
	if($uidonfile == $currentuid){
	    $return_arr = array();
		$sql = "SELECT * FROM `posts` WHERE gid='$gid' ORDER BY date ASC";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
		    $sql2 = "SELECT username FROM signup WHERE uid='$row[uid]'";
		    $result2 = mysqli_query($conn, $sql2);
		    $row2 =  mysqli_fetch_assoc($result2);
            $isCurrentUser = $_SESSION['uid'] == $row['uid'];

		    $sender =  htmlspecialchars($row2['username'], ENT_QUOTES, 'UTF-8');
		    $msg =  htmlspecialchars($row['msg'], ENT_QUOTES, 'UTF-8');

		    $return_arr[] = array("sender" => $sender, "msg" => $msg, "isCurrentUser" => $isCurrentUser);
		}
		echo json_encode($return_arr);
	} else {
		echo("<h1>You do not have access to this group!</h1><p>Maybe somebody removed you from the group...</p>");
	}