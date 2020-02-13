<?php
    session_start();
    if (!isset($_SESSION["uid"])) {
        header("Location:index.php");
    }
    include "include/dbh.php";
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM usertogroup WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    echo "<div class='list-group'><a onclick='changeView(1);' id='creategroup' class='list-group-item list-group-item-success group-listing'><i class='fas fa-plus'></i> Create a new group</a>";
    while($row = mysqli_fetch_assoc($result)){
        $sql2 = "SELECT * FROM groups WHERE gid='$row[gid]'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $groupname =  htmlspecialchars($row2['name'], ENT_QUOTES, 'UTF-8');
        $gid = $row2['gid'];
        echo "<a onclick='changegroup($gid);' class='list-group-item list-group-item-info group-listing'><b>$groupname</b></a>";
    }   
    echo "</div>";
