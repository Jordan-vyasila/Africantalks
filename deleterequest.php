<?php
session_start();
include 'conn.php';
   $myfriend=$_GET['myfriend'];
 
   $sql2=mysqli_query($conn,"DELETE FROM friendrequest WHERE requested='".$_SESSION['id']."' and requester='$myfriend'");
   if($sql2){
      header("Location: friends.php");
   }
   else{
   }
   
?>