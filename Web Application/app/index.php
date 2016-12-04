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
<!DOCTYPE html> 
<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/jquery-1.11.0.min.js"></script> 
      <script src="js/jquery-migrate-1.2.1.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <style> #login { padding-top: 50px } #login .form-wrap { width: 30%; margin: 0 auto; } #login h1 { color: #1fa67b; font-size: 18px; text-align: center; font-weight: bold; padding-bottom: 20px; } #login .form-group { margin-bottom: 25px; } #login .checkbox .character-checkbox { width: 25px; height: 25px; cursor: pointer; border-radius: 3px; border: 1px solid #ccc; vertical-align: middle; display: inline-block; } #login .checkbox .label { color: #6d6d6d; font-size: 13px; font-weight: normal; } #login .btn.btn-custom { font-size: 14px; margin-bottom: 20px; } #login .forget { font-size: 16px; text-align: center; display: block; } .form-control { color: #212121; } .btn-custom { color: #fff; background-color: #1fa67b; } .btn-custom:hover, .btn-custom:focus { color: #fff; } </style>
   </head>
   <body>
      <section id="login">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="form-wrap">
                     <h1>Log in with your account</h1>
                     <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" autocomplete="off">
                        <div class="form-group"> <label for="username" class="sr-only">Username</label> <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username"> </div>
                        <div class="form-group"> <label for="password" class="sr-only">Password</label> <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password"> </div>
                        <input type="submit" id="btn-login" class="btn btn-info btn-lg btn-block" value="Log in"> 
						 <div style="clear: both;"></div>
                     </form><br/>
					  <div style="clear: both;"></div>
<?php if($_SESSION['msg'] != ''){ ?>
<p style="color: red;"><?php echo $_SESSION['msg']; ?></p>
<?php } ?>

                     <p>Don't Have an Account ? <a href="register.php" class="btn btn-primary" >Register Here</a> </p>
                     <hr>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>
