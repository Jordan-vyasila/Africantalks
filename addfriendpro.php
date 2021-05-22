<?php
session_start();
include 'conn.php';
   $requested=$_GET['requested'];
   $requester=$_POST['requester'];

   $sql="INSERT INTO friendrequest(requester,requested,status) VALUES('$requester','$requested','Remove Friendship')";
   $result=mysqli_query($conn,$sql);
   if($result){
      header("Location: africaneditprofile.php");
   }
   else{
   }
   
?>