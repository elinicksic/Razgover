<!DOCTYPE html>
<?php
include "dbh.php";
session_start();
$sql="SELECT * FROM signup WHERE uid='$_SESSION[uid]'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
echo "<h1> Welcome $row[username] </h1>";

$msgs="SELECT msg FROM posts";
$result=mysqli_query($conn, $sql); //HELP
$row=mysqli_fetch_assoc($result); //HELP

?>


<html>
    <head>
    	<title>Chattify - Home</title>
    </head>
    <body>
        <div id="main">
            <?php
                //echo <h1 style="background-color: #6495ed;color: white;"> $row[group]</h1>
            ?>
            <div id="output">
        	    <?php

                    $sql = "SELECT * FROM posts";
                    $result = mysqli_query($conn, $sql);



                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT username FROM signup WHERE uid='$row[uid]'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 =  mysqli_fetch_assoc($result2);
                        echo "<p><b>$row2[username]</b> <br /> $row[msg]</p>";
                    }   
                    
                ?>
            </div>
            <form method="post" action="send.php">
                <input name="msg" type="text" placeholder="Type in your message..." class="form-control" width=100%><br>
                <input type="submit" value="Send" />
            </form>
            <br />
            <form action="logout.php">
                <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit" value=
                "Logout" />
            </form>
        </div> 
    </body>
</html>