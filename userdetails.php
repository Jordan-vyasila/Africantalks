<?php
session_start();
include 'conn.php';
	$id=$_GET['myfriend'];
$q=mysqli_query($conn,"select * from users where phonenumber='$id'");
while ($user=mysqli_fetch_assoc($q)) {
	$imageurl='images/'.$user['image'];
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
				#cover{
					background-image: url('<?php if(empty($user['coverpicture'])===false){echo"coverphoto/".$user['coverpicture']; } ?>');
				    background-position: center;
				    background-repeat: no-repeat;
				    background-size: cover;
					width: 400px;
					height: 450px;
                    border-radius: 5%;
                    object-fit: cover;
		          	}
			</style>
</head>
<body class="grey lighten-3">
<div class="row">
<div class="col l12 m12 s12">
		<div class="" id="navbar" style="position: fixed; width: 100%; left: -0.1%;">
		  <nav class="cyan darken-4 nav-extended">
		<img src="jlog1.png" style="margin-right: 10%; padding: 10px 5px 5px 10px;" class="circle brand-logo left responsive-img" width="100" height="100">
		<!-- <span class="circle brand-logo left" style="margin-left: 1%; padding: 5px 5px 5px 5px; font-size: 70px;"><i class="fa fa red-text circle">A</i>
		</span> -->
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
		<div class="col l6 m12 s12 center">
			<h5>The Profile of <b><?php echo $user['firstname']," ",$user['lastname'],"<br>(",$user['username'],")"; ?></b></h5>

              <center>   	
                  <div  id="cover" class="center card-panel" style="object-fit: cover;">
		              <img src="<?php echo $imageurl; ?>" alt="profile_image" style="border-radius: 50%; width: 120px; height: 120px; border: 9px solid white;margin-left:-37px; margin-top: -37px;object-fit: cover;" class="left">
	             </div>

		         <div class="left">
<?php
           		echo "<h5><b>";
           	 if($user['gender']==='Male'){
				echo "His Friends";
			}elseif($user['gender']==='Female'){
				echo "Her Friends";
			}else{
				echo "The Friends";
			}
			echo "</b></h5>";
           $fq=mysqli_query($conn,"select * from users join friends where friends.me='$id' and users.phonenumber=friends.myfriend");
           while ($f=mysqli_fetch_assoc($fq)) {
           	if($f['me']===$user['phonenumber']){
	        $fimageurl='images/'.$f['image'];
	//profile images
	echo "
	<h6 class='left' style=''>
      <img src='$fimageurl'  style='vertical-align: middle;width: 90px;height: 100px;border-radius: 10%; margin-top:-2%; object-fit: cover;' class=''>
     <a href='#' class=''><u><b class='indigo-text hoverable' style='font-size:29px;'>".$f['firstname']," ",$f['lastname']," (",$f['username'],")</b></u></a><br>";
     echo "string<hr></h6><h5></h5>";
           	}
           }?>

		              </div>
              </center>
		</div>


    <div class="col l6 m12 s12">
	<?php
echo "<h5><b>"; 
	if($user['gender']==='Male'){
				echo "His Posts";
			}elseif($user['gender']==='Female'){
				echo "Her Posts";
			}else{
				echo "The Posts";
			} 
			echo "</b></h5>";

$pq=mysqli_query($conn,"select * from posts join users where users.phonenumber=posts.user and posts.user='$id' order by posttime desc");
while ($p=mysqli_fetch_assoc($pq)) {
	echo"
	<div class='' style='border-right: 1px solid lightgrey;border-left: 1px solid lightgrey;border-top: 1px solid lightgrey;border-radius: 2.5%;'>";
    
   
    

    // posted time
   if(date("Y-m-d H:i", strtotime("1 hour -10 minutes"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>Now</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("1 hour -60 minutes"))<date("Y-m-d H:i",strtotime($p['posttime']))){
$date1=date_create(date("Y-m-d H:i",strtotime($p['posttime'])));
$date2=date_create(date("Y-m-d H:i", strtotime("1 hour")));
$diff=date_diff($date2,$date1);

   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>". $diff->format("%i%")." Mins ago</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("-11 hour"))<date("Y-m-d H:i",strtotime($p['posttime']))){
$date3=date_create(date("Y-m-d H:i",strtotime($p['posttime'])));
$date4=date_create(date("Y-m-d H:i", strtotime("1 hour")));
$diff=date_diff($date4,$date3);

   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>". $diff->format("%h hr%i%")." Mins ago</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("23 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>Today ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("47 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>1d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   } 
   elseif(date("Y-m-d H:i:sa", strtotime("71 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>2d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("95 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>3d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("119 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>4d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("143 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>5d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("167 hours ago"))<date("Y-m-d H:i",strtotime($p['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>6d ".date('H:i:a',strtotime($p['posttime']))."</u></i>";
   }   
   else{
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>".date('D, d/M/Y, h:i a',strtotime($p['posttime']))."</u></i>";
   }  


   //posts display
  echo "<p style='margin:20px;'><span style='margin-left:40px;color:dark;'>";
  if(strlen("".$p['post']."")>400){
   echo "<div class='large-content'>
   <div class='visible-content' style='margin:20px;color:dark;'>
   ".substr("".$p['post']."",0,500,)."...</div>
  <div class='invisible-content' style='margin:20px;color:dark;'>
  ".substr("".$p['post']."",0,)."</div>
  <button class='bt more-less right blue-text white' style='border:0px;margin-top:-29px;'>Read more</button></div>";
    }else{
  	echo $p['post'];}
  echo "</span></p></h6></div>";
  //if image posted
if(empty($p['photo'])===false && $p['filetype']= "jpg" && $p['filetype']= "png" && $p['filetype']= "jpeg"
&& $p['filetype']= "gif"){
	echo "<img src='images/".$p['photo']."'  style='width:100%;object-fit:cover;' class='card-panel center responsive-img'>";

echo "
<a href='images/".$p['photo']."' download='posted_photo' style=''>
         <i class='fa fa-download right'>Download</i>
</a>";
}

	?>
<ul>
	<table style="width: 85%; font-size: 17px;">
		<tr style="border: none;">
			<td>
	<li>
<form method="POST" action="unlikesudetail.php">
	<input type="text" name="id2" value="<?php echo $p['postid']; ?>" hidden>
	<input type="text" name="id3" value="<?php echo $id; ?>" hidden>
		<?php 
		$qliked=mysqli_query($conn,"select * from mylikes where liker='".$_SESSION['id']."' and postcode='".$p['postid']."' limit 1");
          $fr=mysqli_query($conn,"select count(*) from mylikes where postcode='".$p['postid']."'");
          while ($run=mysqli_fetch_array($fr)) {
if ($u=mysqli_fetch_assoc($qliked)) {

		echo "
	<button type='submit' name='like' class='fa fa-thumbs-down green-text'> ".$run['0']."</button> and you
	<a href='#'>".$u['likestatus']."
	</a>";
	}
	else{?>
</form>


<form method="POST" action="likesudetail.php?id=<?php echo $p['postid']; ?>">
	<input type="text" name="id2" value="<?php echo $id; ?>" hidden>
	<input type="text" name="likestatus" value="Likes" hidden>
		<?php
		echo "
	<button type='submit' name='unlike' class='fa fa-thumbs-up green-text'>".$run['0']."</button>
	<a href='#'>Likes</a>";

	}
		
	}
          
          $com=mysqli_query($conn,"select count(*) from mycomments where postid='".$p['postid']."'");
          while ($ru=mysqli_fetch_array($com)) { ?>
	
</form></li>
</td>
<td>
<li style="">
	<a href="comment.php?id=<?php echo $p['postid'];?>" class="">
	<i class="fa fa-comment green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"><?php echo $ru['0']; ?></i>Comments</a>
		
	</li>
</td>
<td>
<li style="">
	<a href="share.php?id=<?php echo $p['postid'];?>" class="">
	<i class="fa fa-share-square-o green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"><?php echo $ru['0']; ?></i>Share</a>
		
	</li>
</td>

<td>
<li style="">
	<a href="hold.php?id=<?php echo $p['postid'];?>" class="">
	<i class="fa fa-save green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"></i>Save</a>
		
	</li></td>
</tr>
</table>
</ul>

<div style='margin-top:5%;'></div>
<?php
echo "<hr style='margin-bottom:7%; margin-top:-4%;'>";
}}
?>
    </div>
</div>
	      <?php include 'bottombar.php'; ?>


</body>
</html>
<?php
} 
?>


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
<script>
$(document).ready(function(){
$(".invisible-content").hide();
$(document).on('click', '.bt', function(){
var moreLessButton = $(".invisible-content").is(':visible') ? 'Read More' : 'Read Less';
$(this).text(moreLessButton);
$(this).parent('.large-content').find(".invisible-content").toggle();
$(this).parent('.large-content').find(".visible-content").toggle();
});
});</script>