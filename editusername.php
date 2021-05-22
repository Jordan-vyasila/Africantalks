<?php
        session_start();
        include 'conn.php';
  $query=mysqli_query($conn,"select * from users where phonenumber='".$_SESSION['id']."'");
while ($row=mysqli_fetch_array($query)) {
   $username=$_POST['username'];
                             
	   if ($_POST['username']===$row['username']) {
	   	?>
	<script>
		window.alert('Assign new username!\n try again');
		window.location.href='africaneditprofile.php';
	</script>
	<?php 
		   }

else{
	$query=mysqli_query($conn,"SELECT * FROM `users` WHERE phonenumber='".$_SESSION['id']."'");

	if (mysqli_fetch_assoc($query)) {

   $sql="UPDATE users SET username='$username' WHERE phonenumber='".$_SESSION['id']."'";

   if(mysqli_query($conn,$sql)){
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

