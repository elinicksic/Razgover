<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	    header("location:index.php");
	}
	include "dbh.php";
	$sql = "SELECT * FROM `posts` ORDER BY date ASC";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
	    $sql2 = "SELECT username FROM signup WHERE uid='$row[uid]'";
	    $result2 = mysqli_query($conn, $sql2);
	    $row2 =  mysqli_fetch_assoc($result2);
	    $sender =  htmlspecialchars($row2['username'], ENT_QUOTES, 'UTF-8');
	    $msg =  htmlspecialchars($row['msg'], ENT_QUOTES, 'UTF-8');
	    if($row['uid'] == $_SESSION['uid']){
	    	//sent by current user
	    	echo("
				<div class='media'>
				    <div class='media-body'>
				        <h4 class='media-heading'>$sender</h4>
				        <p>$msg</p>
				    </div>
				    <div class='media-right'>
				      <img src='https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg' class='media-object' style='width:60px'>
				    </div>
				  </div>
	    	");
	    }else{
	    	//sent by another user
	    	echo("
		    	<div class='media'>
	    			<div class='media-left'>
	      			<img src='img_avatar1.png' class='media-object' style='width:60px'>
	    		</div>
	    		<div class='media-body'>
	      			<h4 class='media-heading'>$sender</h4>
	      			<p>$msg</p>
	    		</div>
	  			</div>
  				<hr>
  			"
  			);
	    }
	}   
?>