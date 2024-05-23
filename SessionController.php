<?php

session_start();

if (!$_SESSION['username']) {
    header("location:../");
}

$userName=$_SESSION['username'];
$userPassword=$_SESSION['password'];
?>