<?php
        session_start();
        include 'conn.php';
  $query=mysqli_query($conn,"select * from users where phonenumber='".$_SESSION['id']."'");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>African talks home</title>
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
					font-size: 27px;
				}
				#na:hover{
					padding-top: 5px;
					background-color: lightgreen;
				}
				#cover{
					background-image: url('<?php if(empty($user['coverpicture'])===true){echo"coverphoto/".$row['coverpicture']; } ?>');
				    background-position: center;
				    background-repeat: no-repeat;
				    background-size: cover;
					width: 200px;
					height: 300px;
          border-radius: 5%;
          object-fit: cover;
				}
#navg{
	margin-top: -9.4%;
}
@media only screen and (max-width:1363px) {
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:1309px) {
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:1227px){
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:1143px){
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:1123px){
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:1003px){
  #navg {
  	margin-top: -11.4%;
  }
}
@media only screen and (max-width:983px) {
  #navg {
  	margin-top: -11.4%;
  }
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
/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}


#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
} 
.bd{
  width: 60px;
  height: 40px;
  background-color: red;
  position: relative;
  /* Safari 4.0 - 8.0 */
  -webkit-animation-name: example;
  -webkit-animation-duration: 5s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-delay: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-direction: alternate;
  /* Standard syntax */
  animation-name: example;
  animation-duration: 5s;
  animation-timing-function: linear;
  animation-delay: 2s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  25%  {background-color:yellow; left:80px; top:0px;}
  50%  {background-color:blue; left:80px; top:0px;}
  75%  {background-color:green; left:0px; top:0px;}
  100% {background-color:red; left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  25%  {background-color:yellow; left:80px; top:0px;}
  50%  {background-color:blue; left:80px; top:0px;}
  75%  {background-color:green; left:0px; top:0px;}
  100% {background-color:red; left:0px; top:0px;}
}
			</style>
</head>
<body style="max-width:1600px" class="grey lighten-3">
	<div class="row  grey lighten-3" style="margin-bottom: -10px">
		<div class="col l3 m12 s12 pinned hide-on-med-and-down">
	<?php include 'africanhomeprofile.php'; ?>
		</div>

		<div class="col l6 m12 s12 offset-l3" style="">
		<div class="" id="navbar" style="position: fixed; width: 48.5%;">
	<?php include 'africanhomenav.php'; ?>
		</div>
			<div class="card-panel white" id="post" style="margin-top: 56px;">
	<?php include 'africanhomepostform.php'; ?>
		    </div>
			<div class="white">
	<?php include 'africanhomepost.php'; ?>
		    </div>
		<?php include 'bottombar.php'; ?>
		</div>

		<div class="col l3 m12 s12 pinned push-l9 hide-on-med-and-down">
             <a id="login" href="logout.php" class="right" style="margin-top: 6px;"><span  ><i><button class="fa fa-sign-out red-text hoverable" id="na">Logout</button></i></span></a>
			<div class="card-panel" >
	<?php include 'africanhomeright.php'; ?>
		</div>
	</div>	
</div>

</body>
</html>
<?php }
?>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-98px";
    document.getElementById("post").style.top = "0";
  }
  prevScrollpos = currentScrollPos;
}
</script>


 <script>
 	//like and dislike
function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
}
</script>