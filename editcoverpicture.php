<?php
        session_start();
        include 'conn.php';
        if(isset($_POST['coverp'])){
        $covpicture= $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"coverphoto/".$_FILES['file']['name']); 

   $sql="UPDATE users SET coverpicture='$covpicture' WHERE phonenumber='".$_SESSION['id']."'";

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

?>

