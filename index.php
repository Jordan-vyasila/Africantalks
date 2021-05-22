<?php
session_start();
include 'conn.php';
		               if (isset($_POST['submit'])) {
				        $phonenumber=$_POST['phonenumber'];
				        $password=$_POST['password'];
				        $_SESSION["id"]=$_POST['phonenumber'];
                             
                             // Used by Normal users
                		$query=mysqli_query($conn,"SELECT * FROM `users` WHERE phonenumber='$phonenumber' AND password='$password'");

			            while($log=mysqli_fetch_assoc($query)) {
			            	if($log['password']===$password){
                     	$run=mysqli_query($conn,"INSERT INTO Logs(phonenumber) VALUES('$phonenumber')");
						?>
						<script>
		                 var timer = setTimeout(function() {
		                 window.location='africanhome.php'
		                    }, 1000);
						</script>
						<?php
						
			              }

		               	// Admin only
		               	elseif ($_SESSION["id"]==="jordantitovyasila" && $_POST['password']==="1995") {
						?>
						<script>
		                 var timer = setTimeout(function() {
		                 window.location='admin.php'
		                    }, 1000);
						</script>
						<?php
		               	}

                        //      Otherwise
                        else{
						?>
						<script>
							window.alert('Login Unsuccessfuly!.Check Phone Number Or Password. Note:Phone number must be used Once.');
							window.history.back();
						</script>
						<?php

                        }}
		               }
		               ?>
 <!DOCTYPE html>
<html>
<head>
	<title>African talks index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="materialize/js/materialize.min.js">
	<link rel="stylesheet" type="text/css" href="materialize/font-awesome/css/font-awesome.min.css">
			<style type="text/css">
				body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
				::placeholder{
					color: black;
					font-size: 27px;
				}
			</style>
</head>
<body style="max-width:1600px;" class="grey lighten-3">
	<div class="row">
		<div class="col l12 m12 s12 center">

			<div class="container">
	<a href="#" onclick="window.location.href='createaccount.php';" class="right hoverable">
		<h6>
			<u><b><i class="fa fa-edit"></i>Sign Up</b></u>
		</h6></a>
</div>
<div class="container margin" style="margin-top: 7%;">
	<center>
		<img src="jlog1.png" width="102" height="102" style="object-fit: cover;border-radius: 50%;">
	</center>
				<h3 class="center">Please Sign in here</h3>

				<form method="POST" action="" enctype="multipart/form-data" class="center">
					<input type="text" name="phonenumber" placeholder="Phone number" style="width:40%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter phone number" maxlength="20" autocomplete="off" onfocus="this.placeholder=''" required><br>

					<input type="password" name="password" placeholder="Password" style="width:40%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter password" maxlength="8" onfocus="this.placeholder=''" required><br><p></p>

					<button type="submit" name="submit" class="fa fa-sign-in blue lighten-3 hoverable" style="width:40%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;">
						<b> Sign in</b>
					</button><p></p><br>
				    <p style="font-size: 26px;margin-top: -16px"><b>Forgot a password? <u><a href="#" class="hoverable">Reset here</a></u></b></p><p></p>
				    <i style="font-size: 26px">Copyright &copy; <i><?php echo date("Y");?></i> African Talks.  All Rights Reserved</i>
				</form>
</div>


		               
		</div>
	</div>
</body>
</html>