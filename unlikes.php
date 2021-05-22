<?php
session_start();
include 'conn.php';
   $id2= $_POST['id2'];
   $id3= $_POST['id3']; 

   $sql=mysqli_query($conn,"DELETE FROM mylikes WHERE liker='".$_SESSION['id']."' and postcode='$id2' and liked='$id3'");
   if($sql){
      header("Location: africanhome.php");
   }
   else{
   }

   
?>
