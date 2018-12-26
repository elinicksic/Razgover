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

$msgs="SELECT msg FROM posts";
$result=mysqli_query($conn, $sql); //HELP
$row=mysqli_fetch_assoc($result); //HELP

/*
IF (SAVED != CURRENT) {
    SAVED = CURRENT;
    display(SAVED);
}
*/
while(1) {
    if () {

    }
}
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
                <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit" value=
                "Logout" />
            </form>
        </div> 
    </body>
</html>