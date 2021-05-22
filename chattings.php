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
			</style>
</head>
<body>
<div class="row">
<div class="col l12 m12 s12">
		<div class="" id="navbar" style="position: fixed; width: 100%; left: -0.1%;">
		  <nav class="indigo nav-extended darken-4">
		<!-- <img src="images/aft.jpg" style="margin-right: 10%; padding: 10px 5px 5px 10px;" class="circle brand-logo left responsive-img" width="100" height="100"> -->
		<span class="circle brand-logo left" style="margin-left: 1%; padding: 5px 5px 5px 5px; font-size: 70px;"><i class="fa fa red-text circle">A</i>
		</span>
		<h2 class="nav-title center fa fa" style="margin-left: 11%; margin-top: 0%">African Talks</h2>
		<p style="margin-left: 14.9%; margin-top: -75.9px; font-size: 120%"><b class="fa fa yellow-text">open mind</b></p>
          </nav>
	<a href="#" onclick="window.location.href='africanhome.php';" class="right" style="margin-top: -3.55%; margin-right: 2%; font-size: 120%;">
		<span  id="na"><u class="fa fa-home white-text hoverable"><b>Home</b></u></span>
	</a>
    </div>
</div>
</div>

	<div class="row" id="body" style="margin-top: 7%;">
		<div class="col l6">
			<h1>African Talks</h1>
		</div>
	</div>

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