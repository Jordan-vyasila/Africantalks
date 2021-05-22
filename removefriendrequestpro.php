<?php
session_start();
include 'conn.php';
   $requested= $_GET['requested']; 
   $requester= $_POST['requester']; 

   $sql=mysqli_query($conn,"DELETE FROM friendrequest WHERE requester='".$_SESSION['id']."' and requested='$requested'");
   if($sql){
      header("Location:  africaneditprofile.php");
   }
   else{
   }

   
?>
