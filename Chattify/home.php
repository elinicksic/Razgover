<!DOCTYPE html>
<?php
include "dbh.php";
if (!isset($_COOKIE['uid'])) {
    header("Location:error.php");
}
$sql="SELECT * FROM signup WHERE uid='$_COOKIE[uid]'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
echo "<h1> Welcome $row[username] </h1>";
?>


<html>
    <head>
    	<title>Chattify - Home</title>
    	<style>
    		body {
                font-family: Arial;
            }
    	</style>
    </head>
    <body>
        <div id="main">
            <h1 style="background-color: #6495ed;color: white;" id="gname"></h1> <!-- Group name -->
            <div id="output">
        	    <?php

                    $sql = "SELECT * FROM posts";
                    $result = mysqli_query($conn, $sql);



                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT username FROM signup WHERE uid='$row[uid]'";
                        $result2 = mysqli_query($conn, $sql2);
                        $name =  mysqli_fetch_assoc($result2);
                        echo "<p><b>$name[username]</b> <br /> $row[msg]</p>";
                    }   
                    
                ?>
            </div>
            <form method="post" action="send.php">
                <textarea name="msg" placeholder="Type in your message..." class="form-control"></textarea><br />
                <input type="submit" value="Send" />
            </form>
            <br />
            <form action="logout.php">
                <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit," name="Logout">
            </form>
        </div> 
    </body>
</html>