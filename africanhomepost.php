<h3 class="center bold">View Posts</h3>
	<?php
$q=mysqli_query($conn,"select * from posts join users where users.phonenumber=posts.user order by posttime desc");
while ($user=mysqli_fetch_assoc($q)) {
	$imageurl='images/'.$user['image'];
	//profile images
	echo "
	<div class='' style='border-right: 1px solid lightgrey;border-left: 1px solid lightgrey;border-top: 1px solid lightgrey;border-radius: 2.5%;'>

	<h6><img src='$imageurl'  style='vertical-align: middle;width: 90px;height: 100px;border-radius: 10%; margin-top:-2%;object-fit: cover;' class='center responsive-img'>";
	//usernames display
	if($user['username']==='Empty'){
	echo "
<a href='#' class=''><u><b class='indigo-text hoverable' style='font-size:29px;'>".$user['firstname']," ".$user['lastname'],"</b></u></a>
<br>";
	}
	elseif($user['username']!=='Empty'){
	echo "
<a href='#' class=''><u><b class='indigo-text hoverable' style='font-size:29px;'>".$user['username'],"</b></u></a>
<br>";
	}
    

    // posted time
   if(date("Y-m-d H:i", strtotime("1 hour -3 minutes"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>Now</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("1 hour -60 minutes"))<date("Y-m-d H:i",strtotime($user['posttime']))){
$date1=date_create(date("Y-m-d H:i",strtotime($user['posttime'])));
$date2=date_create(date("Y-m-d H:i", strtotime("1 hour")));
$diff=date_diff($date2,$date1);

   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>". $diff->format("%i%")." Mins ago</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("-11 hour"))<date("Y-m-d H:i",strtotime($user['posttime']))){
      $date3=date_create(date("Y-m-d H:i",strtotime($user['posttime'])));
      $date4=date_create(date("Y-m-d H:i", strtotime("1 hour")));
      $diff=date_diff($date4,$date3);

   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>". $diff->format("%h hr %i%")." Mins ago</u></i>";
   }
   elseif(date("Y-m-d H:i", strtotime("23 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
      $date3=date_create(date("Y-m-d H:i",strtotime($user['posttime'])));
      $date4=date_create(date("Y-m-d H:i", strtotime("1 hour")));
      $diff=date_diff($date4,$date3);

   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b><u>". $diff->format("%H hr %i%")." Mins ago</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("47 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>1d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   } 
   elseif(date("Y-m-d H:i:sa", strtotime("71 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>2d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("95 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>3d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("119 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>4d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("143 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>5d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   }
   elseif(date("Y-m-d H:i:sa", strtotime("167 hours ago"))<date("Y-m-d H:i",strtotime($user['posttime']))){
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>6d ".date('H:i:a',strtotime($user['posttime']))."</u></i>";
   }   
   else{
   echo "<i class='right black-text' style='font-size:15px; margin-right:5px;'><b>Posted:</b> <u>".date('D, d/M/Y, h:i a',strtotime($user['posttime']))."</u></i>";
   }  
   echo "<br>";

   
       // Friend request and addfriend
$myf=mysqli_query($conn,"select * from friends where me='".$_SESSION['id']."' and myfriend='".$user['user']."'");
if ($isf=mysqli_fetch_assoc($myf)) {
	echo "<big class='blue-text center' style='font-size:50px;'><b>✔✔</b></big>
	  <a href='userdetails.php?myfriend=".$isf['myfriend']."' class='fa fa green white-text lighten-2 hoverable' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>Profile</a><br><p></p>";
}
else{ 
	if($user['user']===$_SESSION['id']){
		// my account
		echo "<big class='green-text center'style='font-size:50px;'><b>✔ Mypost</b></big><br><p></p>";
	}
	elseif($user['user']!==$_SESSION['id']){
if($user['position']!=='Empty' and empty($user['position'])===false){
	echo "<span style='margin-left:10px;font-size:23px;'>Working as:<i class='teal-text text-darken-3'>".$user['position']."</i></span>";
}
		?>
	
	<form method="POST" action="removefriendrequest.php?requested=<?php echo $user['user'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
		<?php 
		$friend=mysqli_query($conn,"select * from friendrequest where requester='".$_SESSION['id']."' and requested='".$user['user']."'");
if ($r=mysqli_fetch_assoc($friend)) {
	echo "
	<a href='userdetails.php?myfriend=".$r['requested']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>View Profile</a>
	<button type='submit' name='submit' class='fa fa-user-plus green-text hoverable'style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>Send request...</button><br><p></p>";
}
else{
				$b=mysqli_query($conn,"select * from friendrequest where requested='".$_SESSION['id']."' and requester='".$user['user']."'");
				if($see=mysqli_fetch_assoc($b)){
					echo "<big class='blue-text center text-lighten-4'><b>✔</b></big>
	<a href='confirmfriend.php?myfriend=".$see['requester']."' class='hoverable red black-text lighten-4' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>Confirm</a>

	<a href='userdetails.php?myfriend=".$see['requester']."' class='fa fa green white-text lighten-2 hoverable' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>Profile</a><br><p></p>";
				}
				else{
					?>
				</form>
	<form method="POST" action="addfriend.php?requested=<?php echo $user['user'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
					<?php
		echo "
	<a href='userdetails.php?myfriend=".$user['user']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>Profile</a>

	<button type='submit' name='submit' class='fa fa-user-plus green-text' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px; font-size:22px;'>add friend</button><br><p></p>";
	?>
</form>
	<?php
				}
	}
}
}
   //posts display
  echo "<p style='margin:20px;'><span style='margin-left:40px;color:dark;'>";
  if(strlen("".$user['post']."")>400){
   echo "<div class='large-content'>
   <div class='visible-content' style='margin:20px;color:dark;'>
   ".substr("".$user['post']."",0,500,)."...</div>
  <div class='invisible-content' style='margin:20px;color:dark;'>
  ".substr("".$user['post']."",0,)."</div>
  <button class='bt more-less right blue-text white' style='border:0px;margin-top:-29px;'>Read more</button></div>";
    }else{
  	echo $user['post'];}
  echo "</span></p></h6></div>";
  //if image posted
if(empty($user['photo'])===false && $user['filetype']= "jpg" && $user['filetype']= "png" && $user['filetype']= "jpeg"
&& $user['filetype']= "gif"){
	echo "<img src='images/".$user['photo']."'  style='width:100%;object-fit:cover;' class='card-panel center responsive-img'>";

echo "
<a href='images/".$user['photo']."' download='posted_photo' style=''>
         <i class='fa fa-download right'>Download</i>
</a>";
}
else{
}
?>
<ul>
	<table style="width: 85%; font-size: 17px;">
		<tr style="border: none;">
			<td>
	<li>
<form method="POST" action="unlikes.php">
	<input type="text" name="id2" value="<?php echo $user['postid']; ?>" hidden>
	<input type="text" name="id3" value="<?php echo $user['user']; ?>" hidden>
		<?php 
		$qliked=mysqli_query($conn,"select * from mylikes where liker='".$_SESSION['id']."' and postcode='".$user['postid']."' limit 1");
          $fr=mysqli_query($conn,"select count(*) from mylikes where postcode='".$user['postid']."'");
          while ($run=mysqli_fetch_array($fr)) {
if ($u=mysqli_fetch_assoc($qliked)) {

		echo "
	<button type='submit' name='like' class='fa fa-thumbs-down green-text'> ".$run['0']."</button> and you
	<a href='#'>".$u['likestatus']."
	</a>";
$date3=date_create(date("Y-m-d H:i:s",strtotime($u['likedtime'])));
$date4=date_create(date("Y-m-d H:i:s", strtotime("1 hour 0 minute 0 seconds")));
$diff=date_diff($date4,$date3);
if($diff->format("%s%")<2){
	?><script> alert("Thanks for like");</script><?php
}
	}
	else{?>
</form>


<form method="POST" action="likes.php?id=<?php echo $user['postid']; ?>">
	<input type="text" name="id2" value="<?php echo $user['user']; ?>" hidden>
	<input type="text" name="likestatus" value="Likes" hidden>
		<?php
		echo "
	<button type='submit' name='unlike' class='fa fa-thumbs-up green-text'>".$run['0']."</button>
	<a href='#'>Likes</a>";

	}
		
	}
          
          $com=mysqli_query($conn,"select count(*) from mycomments where postid='".$user['postid']."'");
          while ($ru=mysqli_fetch_array($com)) { ?>
	
</form></li>
</td>
<td>
<li style="">
	<a href="comment.php?id=<?php echo $user['postid'];?>" class="">
	<i class="fa fa-comment green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"><?php echo $ru['0']; ?></i>Comments</a>
		
	</li>
</td>
<td>
<li style="">
	<a href="share.php?id=<?php echo $user['postid'];?>" class="">
	<i class="fa fa-share-square-o green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"><?php echo $ru['0']; ?></i>Share</a>
		
	</li>
</td>

<td>
<li style="">
	<a href="hold.php?id=<?php echo $user['postid'];?>" class="">
	<i class="fa fa-save green-text grey lighten-2" style="padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;"></i>Save</a>
		
	</li></td>
</tr>
</table>
</ul>

<div style='margin-top:5%;'></div>
<?php
echo "<hr style='margin-bottom:7%; margin-top:-4%;'>";
}
}
?>
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