<?php
session_start();
$_SESSION['username'] = '';
$_SESSION['userid'] = '';
$_SESSION['email'] = '';
$_SESSION['phone'] = '';
$_SESSION['role'] = '';
session_destroy();
header('Location: index.php');
