<?php
        session_start();
        include 'conn.php';
  $query=mysqli_query($conn,"select * from users where phonenumber='".$_SESSION['id']."'");
while ($row=mysqli_fetch_array($query)) {
   $password=$_POST['password'];
   $npassword=$_POST['npassword'];
   $cnpassword=$_POST['cnpassword'];
                             
	   if ($_POST['password']===$_POST['npassword']) {
	   	?>
	<script>
		window.alert('Assign new password!\n try again');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
		   }

		elseif($_POST['npassword']!==$_POST['cnpassword']) {
	   	?>
	<script>
		window.alert('Incorrect confirmed password!\n try again');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
		   }

		elseif($_POST['password']!==$row['password']) {
	   	?>
	<script>
		window.alert('Incorrect user password!\n try again');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
		   }

else{
	$query=mysqli_query($conn,"SELECT * FROM `users` WHERE phonenumber='".$_SESSION['id']."' AND password='$password'");

	if (mysqli_fetch_assoc($query)) {

   $sql="UPDATE users SET password='$npassword' WHERE phonenumber='".$_SESSION['id']."'";

   if(mysqli_query($conn,$sql)){
		$run=mysqli_query($conn,"INSERT INTO changedpassword(phonenumber,oldpassword,newpassword) VALUES('".$_SESSION['id']."','$password','$npassword')");
	?>
	<script>
		window.alert('changes Success\n Welcome User!');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
   }
   else{?>
	<script>
		window.alert('changes Failed\n try again !');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
   }

	  }
	  }
   }
?>

