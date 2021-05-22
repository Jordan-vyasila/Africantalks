
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $msg= "" ;
    
    if(isset($_POST['submit'])){
        $post= $_POST['post'];
        $photo= $_FILES['file']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        //image Upload
    
        move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']); 
        
        
        //move_uploaded_file($_FILES['file']['tmp_name'],"picture/".$_FILES['file']['name']); 
        $res=false;
        $insert_query="INSERT INTO `posts`(`user`, `post`, `photo`,`filetype`) VALUES ('".$_SESSION['id']."','$post','$photo','$filetype')";
        
        $res= mysqli_query($conn,$insert_query);
            
        if($res==true){
            $msg= "<script language='javascript'>
                                       swal(
                                            'Success!',
                                            'Post Completed!',
                                            'success'
                                            );
				          </script>";
        }
        

}
?>
<div class="container">
					<h3><b class="fa">Share your Post</b></h3><br>
            <?php echo $msg;
            ?>
              <center class="hide-on-large-only hide-on-extra-large-only">    
                  <div  id="cover" class="right" style="width: 220px;height: 230px;margin-top: -12%; margin-right: -12%">
                  <img src="images/<?php echo $row["image"]; ?>" alt="profile_image" style="border-radius: 50%; width: 120px; height: 120px; border: 9px solid white;margin-left:-19px; margin-top: -12px; object-fit: cover;" class="left">
               </div>
              </center>
              <p></p>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div>
	<textarea type="text" name="post" placeholder="Write post ....." style="border:1px solid; border-radius: 4px; width: 80%; height: 90px; font-size: 20px;" class="grey lighten-3" title="write post" onfocus="this.placeholder=''"></textarea><br>
	<input type="file" name="file" style=" font-size: 27px" class=""><br>
</div><p></p>

	<button type="submit" name="submit" class="fa right hoverable green darken-3 white-text" style="width:40%; height: 40px; border:1px solid; border-radius: 4px; margin-right: 40%; font-size: 27px"><b>Post</b></button><p></p>
</form>
<h1></h1>
</div>

