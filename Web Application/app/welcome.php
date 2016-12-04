<?php
session_start();
include 'dbtest.php';
mysqli_select_db($link,'mp1-db');
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$sql = mysqli_query($link,"select * from items where userid=$userid");
$count = mysqli_num_rows($sql);
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome <?php echo ucfirst($username); ?></a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<!--<div  class="gallery">
<img src="img/image-1.jpg" alt="image-1" />
<img src="img/image-2.jpg" alt="image-1"/>
<img src="img/image-3.jpg" alt="image-1"/>
<img src="img/image-4.jpg" alt="image-1"/>
</div>-->
</body>
</html>
