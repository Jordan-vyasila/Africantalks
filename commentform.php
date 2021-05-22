
<?php
session_start();
   include 'conn.php';
    
        $comments= $_POST['comments'];
        $postid= $_POST['postid'];
        $photo= $_FILES['file']['name'];
        
        //image Upload
    
        move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']); 
        
        
        //move_uploaded_file($_FILES['file']['tmp_name'],"picture/".$_FILES['file']['name']); 
        $res=false;
        $insert_query="INSERT INTO `mycomments`(`comments`, `postid`, `photo`,commenter) VALUES ('$comments','$postid','$photo','".$_SESSION['id']."')";
        
        $res= mysqli_query($conn,$insert_query);
            
        if($res==true){
         header("location:comment.php?id=$postid");
        }
        
?>