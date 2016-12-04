<?php
session_start();
$link = mysqli_connect('roundcube.c2amfvktfbda.us-east-1.rds.amazonaws.com', 'roundcube', 'R2oundC8ubE$x','mp1-db') or die('couldnot connect');
if($_SESSION['userid'] != ''){
header('Location: welcome.php');
}
$username = $_POST['username'];
$password = $_POST['pwd'];
if($username != '' && $password != ''){
$sql = mysqli_query($link,"select * from login where username='".$username."' and password='".$password."'");
$count = mysqli_num_rows($sql);
if($count > 0){
$row = mysqli_fetch_object($sql);
//echo $row->username;die;
$id = $row->id;
$username = $row->username;
$_SESSION['userid'] = $id;
$_SESSION['username'] = $username;
$_SESSION['email'] = $row->email;
$_SESSION['phone'] = $row->phoneno;
$_SESSION['role'] = $row->role;
header('Location: welcome.php');
}
else{
$_SESSION['msg'] = 'Invalid Username/Password';
}
}
else{
}
?>