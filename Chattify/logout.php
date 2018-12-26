<?php
if (!isset($_COOKIE['uid'])) {
    unset($_COOKIE['uid']);
    setcookie('uid', '', time() - 3600, '/');
}

header("Location:index.php");
?>