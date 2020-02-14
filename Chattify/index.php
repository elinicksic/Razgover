<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['uid'])){
    header("location:home.php");
}
?>
<html>
<title>Razgover</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css">
<head>
</head>
<body>
    <div id="topnav">
        <h1>Welccome to Razgover</h1>
        <a class="btn btn-outline-primary topnavBtn" id="topnavLogin" href="login.php" role="button">Login</a>
        <a class="btn btn-outline-primary topnavBtn" id="topnavSignup" href="signup.php" role="button">Signup</a>
    </div>
    <div id="content">
        <h2>What is Razgover?</h2>
        <p>Razgover is a project built by junior high students to message each other. You can find this on github <a href="https://github.com/Razgover/Razgover">here</a>!</p>
    </div>
</body>
</html>