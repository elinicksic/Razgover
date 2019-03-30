<!DOCTYPE html>
<?php
include "dbh.php";
session_start();
if(!isset($_SESSION['uid'])){
    header("location:index.php");
}

?>


<html>
    <head>
    	<title>Razgover - Home</title>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#output").load("load.php");
            });
        </script>
    </head>
    <body>

        <div id="main">
            

            <div id="sidenav" >
                <a href="creategroup.php">Create a new group</a>
                <?php
                    $sql="SELECT gid FROM usertogroup WHERE uid='$_SESSION[uid]'";
                    $result=mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)){
                        $sql2="SELECT name FROM groups WHERE gid='$row[gid]'";
                        $result2=mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<p><b>$row2[name]</b></p>";
                    }   
                ?>

            </div>
            <div id="content">
                
                <div id="output">
            	    
                </div>
                <form method="post" action="send.php">
                    <input name="msg" type="text" placeholder="Type in your message..." class="form-control" width=100% id="input">
                    <br>
                    <input type="submit" value="Send" />
                </form>
                <br>
                <form action="logout.php">
                    <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit" value="Logout" />
                </form>
            </div> 
            <div id="topnav">
                <?php
                    $sql="SELECT * FROM signup WHERE uid='$_SESSION[uid]'";
                    $result=mysqli_query($conn, $sql);
                    $row=mysqli_fetch_assoc($result);
                    echo "<h1> Welcome $row[username] </h1>";
                ?>
            </div>
        </div>
    </body>
</html>