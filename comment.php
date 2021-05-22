<?php
session_start();
 include 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="materialize/js/materialize.min.js">
	<link rel="stylesheet" type="text/css" href="materialize/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="materialize/compjquery-3.5.1.min.js"></script>
			<style type="text/css">
				body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
				::placeholder{
					color: black;
					font-size: 20px;
				}


.panelcomment {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  margin-left: -30%;
  border: 2px solid black;
  margin-top: 2%;
}
				#na{
					color: white;
				}
				#na:hover{
					background-color: green;
				}
			</style>
</head>
<body>
<div class="row">
	<div class="col l12 m12 s12">
		<div class="" id="navbar" style="position: fixed; width: 100%; left: -0.1%;"><nav class="cyan darken-4 nav-extended">
		<img src="jlog1.png" style="margin-right: 10%; padding: 10px 5px 5px 10px;" class="circle brand-logo left responsive-img" width="100" height="100">
		<!-- <span class="circle brand-logo left" style="margin-left: 1%; padding: 5px 5px 5px 5px; font-size: 70px;"><i class="fa fa red-text circle">A</i>
		</span> -->
		<h2 class="nav-title center fa fa" style="margin-left: 11%; margin-top: 0%">African Talks</h2>
		<p style="margin-left: 14.9%; margin-top: -75.9px; font-size: 120%"><b class="fa fa yellow-text">open mind</b></p>
</nav>
	<a href="africanhome.php?id=<?php echo $_GET['id']; ?>" class="right" style="margin-top: -3.55%; margin-right: 2%; font-size: 120%;">
		<span  id="na"><u class="fa fa-home white-text hoverable"><b>Home</b></u></span>
	</a>
		</div>
		<div class="card-panel" id="comment" style="margin: 3% 20% 0% 20%">
 	<h2 class="center"><b>Comments to post from</b></h2>
	<?php 
	$id=$_GET['id'];
$q=mysqli_query($conn,"select * from posts join users where users.phonenumber=posts.user and posts.postid='$id' order by posttime desc limit 5");
while ($user=mysqli_fetch_assoc($q)) {
	$imageurl='images/'.$user['image'];
	//profile images
	echo "
	<div class=''>
	<h6><img src='$imageurl'  style='vertical-align: middle;width: 50px;height: 50px;border-radius: 10%;' class='center responsive-img'>";
	//usernames display
	if($user['username']==='Empty'){
	echo "
<a href='#' class=''><u><b class='indigo-text hoverable'>".$user['firstname']," ".$user['lastname'],"</b></u></a>
<br>";
	}
	elseif($user['username']!=='Empty'){
	echo "
<a href='#' class=''><u><b class='indigo-text hoverable'>".$user['username'],"</b></u></a>
<br>";
	}
	//friend request 
   //posts display
  echo "<span style='margin-left:70px;'>",$user['post']."</span></h6></div>";
  //if image posted
if(empty($user['photo'])===false && $user['filetype']= "jpg" && $user['filetype']= "png" && $user['filetype']= "jpeg"
&& $user['filetype']= "gif"){
	echo "<img src='images/".$user['photo']."'  style='width:100%;' class='card-panel center responsive-img'>";
}
else{
}
?>






 	<h4 class="center">Comments</h4>
 	<?php
  $query=mysqli_query($conn,"select * from mycomments join users where users.phonenumber=mycomments.commenter and mycomments.postid='$id'");
while ($row=mysqli_fetch_array($query)) {
	echo "<p style='border-radius: 5% 10% 5% 10%; margin:1% 20% 1% 20%;background-color:khaki;' class='center'>
	<h6><a href='#'>
	<img src='images/".$row['image']."'  style='vertical-align: middle;width: 50px;height: 50px;border-radius: 10%;' class='center responsive-img'>
	<u><b class='indigo-text hoverable'>".$row['firstname'],"</b></u></a></h6>
	<span>".$row['comments']."</span><br>";
if(empty($row['photo'])===false){
	echo "<img src='images/".$row['photo']."'  style='width:30%;' class='center responsive-img'></p><br>";
}
else{
}
echo "<hr>";
} ?>
 <form method="POST" action="commentform.php" enctype="multipart/form-data">
 	<h5>Share your Comment</h5>
	<textarea type="text" name="comments" placeholder="Write comment ....." style="border:1px solid; border-radius: 4px;" class="grey lighten-3" title="write comment" onfocus="this.placeholder=''"></textarea><br>
	<input type="text" name="postid" value="<?php echo $id; ?>" hidden>
 	<input type="file" name="file"><p></p>
 	<button type="submit" name="comment" class=" fa fa-send">Comment</button><p></p>
 </form>
</div>
</div>
<div class="row">
	<div class="col l12 m12 s12" style="margin-bottom: -10%;">
		<?php include 'bottombar.php'; ?>
	</div>
</div>	

</body>
</html>
<?php }?>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-75px";
    document.getElementById("comment").style.top = "0px";
  }
  prevScrollpos = currentScrollPos;
}
</script>