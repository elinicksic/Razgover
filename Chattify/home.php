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
        <script type="text/javascript" src="JavaScript/SendReceive.js"></script>
        <script type="text/javascript" src="JavaScript/Util.js"></script>
        <script type="text/javascript" src="JavaScript/CreateGroup.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="stylesheet.css">

        <script>
            //start the sidenav closed
            var sidenavopen = false;
            $(document).ready(function(){
                //update the size of the sidenav
                updateSize();
                //update size if the window is resized
                $(window).resize(function(){
                    updateSize();
                });
                //On click to the sidenav open and close button
                $("#togglesidenav").click(function(){
                    //swap the state of the sidenav
                    if(sidenavopen){
                        closeNav();
                        sidenavopen = false;
                    } else {
                        openNav();
                        sidenavopen = true;
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                scrollBottom();
                loadMessages(currentGroup);
                $("#sidenav").load("load_groups.php");
                setInterval(function(){ 
                    //check if scroll is at the bottom before load 
                    var isAtBottom = 0;
                    if($(window).scrollTop() + $(window).height() == $(document).height()){
                        isAtBottom = true;
                    } else {
                        isAtBottom = false;
                    }
                    //load new messages
                    //$("#output").load("load.php"); 
                    loadMessages(currentGroup);
                    $("#sidenav").load("load_groups.php");
                    //if it was at the bottom before load, then make it at the bottom after
                    if(isAtBottom){
                        scrollBottom(); 
                    }
                    
                }, 1000);              
            });
            
        </script>
        <script>
            //set the default group to 1
            var currentGroup = 1;
            $(document).ready(function(){
                //when sending a new message
                $("#msgform").submit(function(){
                    //store the msg in a var
                    var msg = $("#input").val();
                    //send the message and if it succeeds clear the message box and reload the messages
                    sendMessage(msg, currentGroup, function(){
                        loadMessages(currentGroup);
                        $("#input").val('');
                    });

                    scrollBottom();
                });
            });

        </script>
    </head>
    <body>
        <div id="main">
            <div id="sidenav"></div>

            <div id="content">    
                <div id="messageview">            
                    <div id="output"></div>
                    <div id="bottom">
                        <form id="msgform" action="javascript:void(0);">
                            <input name="msg" autocomplete="off" type="text" placeholder="Type in your message..." class="form-control" id="input" maxlength="200">
                        </form>
                        <br>
                    </div>
                </div>

                <div id="creategroupview">
                    <label><b>Name</b></label>
                    <input id="groupnamebox" type="text" name="name" autocomplete="off" placeholder="Name your Group"><br><br>
                    <ul id="peoplelist">
                    </ul>
                    <form id="addpersonform" action="javascript:void(0);">
                        <label><b>People</b></label>
                        <input type="text" autocomplete="off" name="people" placeholder="Username" id="AddUsernameBox"><br><br>
                        <input class="btn" type="submit" value="Add" /><br><br>
                    </form>
                    <button class="btn btn-primary" id="submitgroup">Create Group</button>
                    <button class="btn btn-danger" id="cancelgroupcreate">Cancel</button>
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