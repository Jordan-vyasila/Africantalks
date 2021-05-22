<?php
session_start();
include 'conn.php';
   
   $id= $_GET['id']; 
   $id2= $_POST['id2'];
   $likestatus=$_POST['likestatus'];

   $sql="INSERT INTO mylikes(liker,postcode,liked,likestatus) VALUES('".$_SESSION['id']."','$id','$id2','$likestatus')";
   $result=mysqli_query($conn,$sql);
   if($result){
      header("Location: userdetails.php?myfriend=".$id2."");
   }
   else{
   }
   
?>