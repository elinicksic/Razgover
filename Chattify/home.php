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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="stylesheet.css">
        <script>
            var sidenavopen = false;
            $(document).ready(function(){
                updateSize();
                $(window).resize(function(){
                    updateSize();
                });
                $("#togglesidenav").click(function(){
                    if(sidenavopen){
                        closeNav();
                        sidenavopen = false;
                    } else {
                        openNav();
                        sidenavopen = true;
                    }
                });
            });
            function updateSize(){
                if($(window).width() < 800){
                    $("#welcomesign").css("margin-left", "30px");
                    if(sidenavopen == false){
                        closeNav();
                    }
                    $("#togglesidenav").show();
                } else {
                    $("#welcomesign").css("margin-left", "5px");
                    openNav();
                    $("#togglesidenav").hide();
                }
            }
            function openNav() {
                $("#sidenav").width(200);
                $("#main").css("margin-left", "210px");
                $("#sidenavsymbol").removeClass('fa-angle-right').addClass('fa-angle-left');
            }
 
            function closeNav() {
                $("#sidenav").width(0);
                $("#main").css("margin-left", "10px");
                $("#sidenavsymbol").removeClass('fa-angle-left').addClass('fa-angle-right');
            }
            
        </script>
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
                <div id="bottom">
                    <form id="msgform" action="javascript:void(0);">
                        <input name="msg" autocomplete="off" type="text" placeholder="Type in your message..." class="form-control" id="input" maxlength="200">
                    </form>

                    <br>
                </div>
            </div>

            

            <div id="topnav">
                <?php
                    $sql="SELECT * FROM signup WHERE uid='$_SESSION[uid]'";
                    $result=mysqli_query($conn, $sql);
                    $row=mysqli_fetch_assoc($result);
                    echo "<h1 id='welcomesign'>Welcome $row[username] </h1>";
                ?>
                <a id="togglesidenav"><i id="sidenavsymbol" class="fas fa-angle-right fa-3x"></i></a>
                <div class="dropdown" id="dropdown">
                    <a class="dropdown-toggle" id="menu1" data-toggle="dropdown" href="">
                        <i class="fas fa-ellipsis-h fa-3x"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="menu1">
                        <li role="presentation" class="disabled">
                            <a role="menuitem" tabindex="-1" href="">Group Settings</a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a role="menuitem" tabindex="-1" href="">Account Settings</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="logout.php">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>