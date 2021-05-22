<?php 
include 'conn.php';
				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$emailaddress=$_POST['emailaddress'];
				$phonenumber=$_POST['phonenumber'];
				$password=$_POST['password'];



                if ($_POST['firstname']===$_POST['lastname']) {
					echo"<center><font style=color:red>Submission Failed</font>Names must be different</center>";
				}

                elseif (!preg_match("/^[a-zA-Z]*$/",$_POST['firstname'])) {
					echo"<center><font style=color:red>Submission Failed</font>. first name,Only letters and no white space allowed</center>";
				}

                elseif (!preg_match("/^[a-zA-Z]*$/",$_POST['lastname'])) {
					echo"<center><font style=color:red>Submission Failed</font>. last name,Only letters and no white space allowed</center>";
				}

				elseif (!preg_match("/^[0-9]*$/",$_POST['phonenumber'])) {
					echo"<center><font style=color:red>Submission Failed</font>.Phone number, only number are allowed</center>";
				}
				
				elseif (!filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL)) {
					echo"<center><font style=color:red>Submission Failed</font>.Email,Invalid email format</center>";
                }
				elseif ($_POST['password']!==$_POST['confirmpassword']) {
					echo"<center><font style=color:red>Submission Failed</font>.Password and Confirm Password must be the same</center>";
				}
				else{
				$run=mysqli_query($conn,"INSERT INTO users(firstname,lastname,emailaddress,phonenumber,password) VALUES('$firstname','$lastname','$emailaddress','$phonenumber','$password')");
				if($run){
						?>
						<script class="red-text">
							window.alert('Registration Success\n CHANGE YOUR PASSWORD AFTER LOGIN');
							window.location.href='index.php';
						</script>
						<?php
				}
				else{
					echo"<center><font style=color:red>Registration Failed</font>.No data recorded,This is due to Number used already registered in existing Account<br> Or no Data entered.</center>";
				}
			}
			 ?>