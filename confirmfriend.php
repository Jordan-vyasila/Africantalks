<?php
session_start();
include 'conn.php';
   $myfriend=$_GET['myfriend'];

   $sql="INSERT INTO friends(me,myfriend) VALUES('".$_SESSION['id']."','$myfriend'),('$myfriend','".$_SESSION['id']."')";
   $result=mysqli_query($conn,$sql);
   if($result){ 
   $sql2=mysqli_query($conn,"DELETE FROM friendrequest WHERE requested='".$_SESSION['id']."' and requester='$myfriend'");
   if($sql2){
      header("Location: friends.php");
   }
   }
   else{
   }
   
?>