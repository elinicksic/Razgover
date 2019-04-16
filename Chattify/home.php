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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                $("#sidenav").load("load_groups.php");
                setInterval(function(){ 
                    //check if scroll is at the bottom before load 
                    var isAtBottom;
                    if($(window).scrollTop() + $(window).height() == $(document).height()){
                        isAtBottom = true;
                    } else {
                        isAtBottom = false;
                    }
                    //load new messages
                    $("#output").load("load.php"); 
                    $("#sidenav").load("load_groups.php");
                    //if it was at the bottom before load, then make it at the bottom after
                    if(isAtBottom){
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
            <div id="sidenav" ></div>

            <div id="content">                
                <div id="output"></div>
            </div>

            <div id="bottom">
                <form id="msgform" action="javascript:void(0);">
                    <input name="msg" autocomplete="off" type="text" placeholder="Type in your message..." class="form-control" id="input" maxlength="200">
                </form>

                <br>
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