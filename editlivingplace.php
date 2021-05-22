<?php
        session_start();
        include 'conn.php';
        $lv= $_POST['livingplace']; 

   $sql="UPDATE users SET livingplace='$lv' WHERE phonenumber='".$_SESSION['id']."'";

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

?>

