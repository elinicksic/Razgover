<?php
session_start();
include "dbh.php";

$uname=mysqli_real_escape_string($conn, $_POST["uname"]);
$email=mysqli_real_escape_string($conn, $_POST["email"]);
$pass=mysqli_real_escape_string($conn, $_POST["pass"]);
$passconf=mysqli_real_escape_string($conn, $_POST["passconf"]);
$hash = password_hash($pass, PASSWORD_BCRYPT);

$sql="SELECT * FROM signup WHERE username='$uname'";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);

if(trim($uname) == '' || trim($pass) == '' || trim($email) == ''){
    echo("Fill in all the values!");
}else{
    if($pass != $passconf){
        echo("Passwords don't match!");
    }else {
        if ($row['uid'] != '') {
            echo("Username Taken!");
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo("Invalid email address!");
            } else {
                $sql2 = "INSERT INTO signup(username, email, password, verified) VALUES ('$uname', '$email', '$hash', '0')";
                $result2 = $conn->query($sql2);
                $sql3 = "SELECT uid FROM signup WHERE username='$uname'";
                $result3 = $conn->query($sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $_SESSION["uid"] = $row3["uid"];
            }
        }
    }
}

