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
		<div class="" id="navbar" style="position: fixed; width: 100%; left: -0.1%;"><nav class="indigo nav-extended darken-4">
		<!-- <img src="images/aft.jpg" style="margin-right: 10%; padding: 10px 5px 5px 10px;" class="circle brand-logo left responsive-img" width="100" height="100"> -->
		<span class="circle brand-logo left" style="margin-left: 1%; padding: 5px 5px 5px 5px; font-size: 70px;"><i class="fa fa red-text circle">A</i>
		</span>
		<h2 class="nav-title center fa fa" style="margin-left: 11%; margin-top: 0%">African Talks</h2>
		<p style="margin-left: 14.9%; margin-top: -75.9px; font-size: 120%"><b class="fa fa yellow-text">open mind</b></p>
</nav>
	<a href="africanhome.php" class="right" style="margin-top: -3.55%; margin-right: 2%; font-size: 120%;">
		<span  id="na"><u class="fa fa-home white-text hoverable"><b>Home</b></u></span>
	</a>
</div>
</div>
</div>
<div class="row" id="body" style="margin-top: 7%;">
<div class="col l3 m12 s12 fa">
	<h3 class="center" style="font-size: 35px;">Friend requests</h3>
	<?php 
	$req=mysqli_query($conn,"select * from friendrequest join users where users.phonenumber=friendrequest.requester and friendrequest.requested='".$_SESSION['id']."'");
	while ($rq=mysqli_fetch_assoc($req)) {
		echo "<p style='border-radius: 5% 10% 5% 10%; margin:1% 20% 1% 20%;background-color:khaki;' class='center'>
	<h6><a href='#'>
	<img src='images/".$rq['image']."'  style='vertical-align: middle;width: 50px;height: 50px;border-radius: 10%;object-fit: cover;' class='center responsive-img'>
	<u><b class='indigo-text hoverable'>".$rq['firstname'],"</b></u></a></h6>
	<span></span>
	<a href='frienddetails.php?myfriend=".$rq['requester']."'>Profile</a>
	<a href='confirmfriend.php?myfriend=".$rq['requester']."'>Confirm</a>
	<a href='deleterequest.php?myfriend=".$rq['requester']."'>Delete</a></p><br><hr>";
	}
	 ?>
</div>
<div class="col l6 m12 s12 fa">
	<h3 class="center" style="font-size: 35px;">My Friends</h3>
	<?php 
	$frnds=mysqli_query($conn,"select * from friends where me='".$_SESSION['id']."'limit 1");
	while($frn=mysqli_fetch_assoc($frnds)){
		if($frn['myfriend']===$_SESSION['id']){
	$frnds2=mysqli_query($conn,"select* from friends join users where users.phonenumber!='".$_SESSION['id']."' and users.phonenumber=friends.me");
	while ($frn=mysqli_fetch_assoc($frnds2)) {
		echo "<p style='border-radius: 5% 10% 5% 10%; margin:1% 20% 1% 20%;background-color:khaki;' class='center'>
	<h6><a href='#'>
	<img src='images/".$frn['image']."'  style='vertical-align: middle;width: 50px;height: 50px;border-radius: 10%;object-fit: cover;' class='center responsive-img'>
	<u><b class='indigo-text hoverable'>".$frn['firstname']," ".$frn['phonenumber'],"</b></u></a></h6>
	<span></span>
	<a href='frienddetails.php?myfriend=".$frn['myfriend']."'>Profile</a>
	<a href='blockfriend.php?myfriend=".$frn['myfriend']."'>Block1</a>
	<a href='removefriend.php?myfriend=".$frn['myfriend']."'>Remove</a><br><hr>";
	}
		}
			
			else{
	$frnds2=mysqli_query($conn,"select * from friends join users on friends.me='".$_SESSION['id']."' and friends.myfriend=users.phonenumber");
	while ($frn=mysqli_fetch_assoc($frnds2)) {
		echo "<p style='border-radius: 5% 10% 5% 10%; margin:1% 20% 1% 20%;background-color:khaki;' class='center'>
	<h6><a href='#'>
	<img src='images/".$frn['image']."'  style='vertical-align: middle;width: 50px;height: 50px;border-radius: 10%;object-fit: cover;' class='center responsive-img'>
	<u><b class='indigo-text hoverable'>".$frn['firstname']," ".$frn['phonenumber'],"</b></u></a></h6>
	<span></span>
	<a href='frienddetails.php?myfriend=".$frn['myfriend']."'>Profile</a>
	<a href='blockfriend.php?myfriend=".$frn['myfriend']."'>Block</a>
	<a href='removefriend.php?myfriend=".$frn['myfriend']."'>Remove</a><br><hr>";
	}}}
	 ?>
</div>	
<div class="col l3 m12 s12 fa">
	<h3 class="center" style="font-size: 35px;">May be friend</h3>
</div>
</div>

		<?php include 'bottombar.php'; ?>

</body>
</html>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-75px";
    document.getElementById("body").style.top = "0px";
  }
  prevScrollpos = currentScrollPos;
}
</script>