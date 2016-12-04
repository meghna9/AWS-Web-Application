<?php
session_start();
include 'dbtest.php';
mysqli_select_db($link,'mp1-db');
$username = $_POST['username'];
$password = $_POST['pwd'];
$phone = $_POST['phoneno'];
$email = $_POST['email'];
$conpwd = $_POST['cpwd'];
if($username != '' && $password != '' && $email != '' && $phone != '' && $conpwd != ''){
$sql = mysqli_query($link,"select * from login where username='".$username."'");
$count = mysqli_num_rows($sql);
if($count > 0){
$_SESSION['msg'] = 'Username Already Taken.Please Enter Different One.';
}
else{
if($password != $conpwd){
$_SESSION['msg'] = 'Both Passwords not match.';
}
else{
$sql2 = mysqli_query($link,"insert into login(username,email,phoneno,password,role) values('$username','$email','$phone','$password','user')");
if($sql2){
$_SESSION['msg'] = 'Successfully Registered.';
header('Location: index.php');
}
else{
$_SESSION['msg'] = 'Some Error in DB.';
}
}
}
}
?>
<!DOCTYPE html> 
<html>
   <head>
      <title>Register Account</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/jquery-1.11.0.min.js"></script> 
	  <script src="js/jquery-migrate-1.2.1.min.js"></script> 
	  <script src="js/bootstrap.min.js"></script> 
      <style>
		  #login { padding-top: 50px } 
		  #login .form-wrap { width: 30%; margin: 0 auto; } 
		  #login h1 { color: #1fa67b; font-size: 18px; text-align: center; font-weight: bold; padding-bottom: 20px; } 
		  #login .form-group { margin-bottom: 25px; } 
		  #login .checkbox .character-checkbox { width: 25px; height: 25px; cursor: pointer; border-radius: 3px; border: 1px solid #ccc; vertical-align: middle; display: inline-block; } 
		  #login .checkbox .label { color: #6d6d6d; font-size: 13px; font-weight: normal; } 
		  #login .btn.btn-custom { font-size: 14px; margin-bottom: 20px; } 
		  #login .forget { font-size: 16px; text-align: center; display: block; } 
		  .form-control { color: #212121; } 
		  .btn-custom { color: #fff; background-color: #1fa67b; } 
		  .btn-custom:hover, .btn-custom:focus { color: #fff; } 
	   </style>
   </head>
   <body>
      <section id="login">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="form-wrap">
                     <h1>Register an Account</h1>
                     <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" autocomplete="off">
                        <div class="form-group"> <label for="username" class="sr-only">Username</label> <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required> </div>
						   <div class="form-group"> <label for="email" class="sr-only">Email</label> <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required> </div>
						 <div class="form-group"> <label for="email" class="sr-only">Phone No</label> <input type="tel" name="phoneno" id="phoneno" class="form-control" placeholder="Enter Phone No" required> </div>
                        <div class="form-group"> <label for="password" class="sr-only">Password</label> <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" required> </div>
						  <div class="form-group"> <label for="password" class="sr-only">Confirm Password</label> <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Enter Confirm Password" required> </div>
                        <input type="submit" id="btn-login" class="btn btn-info btn-lg btn-block" value="Submit"> 
						
                     </form><br/>
<?php if($_SESSION['msg']!=''){ ?>
<p style="color: red;"><?php echo $_SESSION['msg']; ?></p>
<?php } ?>
                     <hr>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>
