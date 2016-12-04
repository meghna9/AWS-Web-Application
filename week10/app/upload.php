<?php
session_start();
include 'dbtest.php';
mysqli_select_db($link,'mp1-db');
$userid = $_SESSION['userid'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);
$filename = $_FILES['image_file']['name'];
 if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image_file"]["name"]). " has been uploaded.";
$path = "http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/".$target_file;
$sql = mysqli_query($link,"insert into items(userid,email,phone,s3rawurl,s3finishedurl,status,issubscribed) values($userid,'".$email."','".$phone."','".$target_file."','".$path."',1,1)");

    } else {
        echo "Sorry, there was an error uploading your file with ".$_FILES['image_file']['name'];
    }
?>
