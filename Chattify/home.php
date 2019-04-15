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
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function scrollBottom(){
                setTimeout(function(){
                    $('html, body').scrollTop($(document).height());
                }, 100);
            }
            $(document).ready(function(){
                scrollBottom();
                $("#output").load("load.php");
                setInterval(function(){   
                    $("#output").load("load.php"); 
                    if($('html, body').scrollTop() == $(document).height()){
                        scrollBottom();
                    }
                }, 1000);              
            });
            
        </script>
        <script>
            $(document).ready(function(){
            $("#msgform").submit(function(){
                var msg=$("#input").val();
                $.ajax({
                    url:'send.php',
                    method:'POST',
                    data:{
                        msg:msg
                    },
                   success:function(data){
                        $("#output").load("load.php");  
                        $("#input").val('');  
                   }
                });
                scrollBottom();
            });
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
                <div id="bottom">
                    <form id="msgform" action="javascript:void(0);">
                        <input name="msg" autocomplete="off" type="text" placeholder="Type in your message..." class="form-control" width=100% id="input" maxlength="200">
                        <br>
                        <input type="submit" value="Send" id="submitmsg" />
                    </form>
                    <br>
                    <form action="logout.php">
                        <input style="width: 100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit" value="Logout" />
                    </form>
                </div>
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