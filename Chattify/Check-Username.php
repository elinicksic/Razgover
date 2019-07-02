<?php
include "dbh.php";
$username = mysqli_real_escape_string($conn, $_POST["uname"]);
$sql="SELECT * FROM signup WHERE username='$username'";
$result = $conn->query($sql);
$numrows = $result->num_rows;
$errorswithsql=$conn->error;
if($numrows == 0){
	echo("0");
}else{
	echo("1");
}
?>