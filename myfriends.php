<center><h4>Add Friend</h4></center><hr><br>
<?php
$q=mysqli_query($conn,"select * from users order by datedded desc");
while ($use=mysqli_fetch_assoc($q)) {
$myf=mysqli_query($conn,"select * from friends where me='".$_SESSION['id']."' and myfriend='".$use['phonenumber']."'");
if ($isf=mysqli_fetch_assoc($myf)) {
	echo "";
}
else{ 
	if($use['phonenumber']===$_SESSION['id']){
		// my account
		echo "";
	}
	elseif($use['phonenumber']!==$_SESSION['id']){
		?>
	
	<form method="POST" action="removefriendrequestpro.php?requested=<?php echo $use['phonenumber'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
		<?php 
		$friend=mysqli_query($conn,"select * from friendrequest where requester='".$_SESSION['id']."' and requested='".$use['phonenumber']."'");
if ($r=mysqli_fetch_assoc($friend)) {
	$imageurl='images/'.$use['image'];
	//profile images
	echo "<img src='$imageurl'  style='vertical-align: middle;width: 80px;height: 90px;border-radius: 10%; margin-top:-2%;object-fit: cover;' class='center responsive-img'><i style='font-size:27px'>"," ".$use['firstname']."</i><br>";

	echo "
	<a href='userdetails.php?myfriend=".$use['phonenumber']."' class='hoverable' style='font-size:22px;'>Profile</a>
	<button type='submit' name='submit' class='hoverable red-text text-lighten-1'style='font-size:22px; border:0px'>Send request...</button><br><p></p><h1></h1>";
}
else{
				$b=mysqli_query($conn,"select * from friendrequest where requested='".$_SESSION['id']."' and requester='".$use['phonenumber']."'");
				if($see=mysqli_fetch_assoc($b)){
	$imageurl='images/'.$use['image'];
	//profile images
	echo "<img src='$imageurl'  style='vertical-align: middle;width: 80px;height: 90px;border-radius: 10%; margin-top:-2%;object-fit: cover;' class='center responsive-img'><i style='font-size:27px'>"," ".$use['firstname']."</i><br>";


					echo "
					<big class='blue-text center text-lighten-4'><b>✔</b></big>
	<a href='confirmfriendpro.php?myfriend=".$use['phonenumber']."' class='hoverable brown-text' style='font-size:22px;'>Confirm</a>

	<a href='userdetails.php?myfriend=".$see['requester']."' class='hoverable' style='font-size:22px;'>Profile</a><br><p></p><h1></h1>";
				}
				else{
					?>
				</form>
	<form method="POST" action="addfriendpro.php?requested=<?php echo $use['phonenumber'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
					<?php
	$imageurl='images/'.$use['image'];
	//profile images
	echo "<img src='$imageurl'  style='vertical-align: middle;width: 80px;height: 90px;border-radius: 10%; margin-top:-2%;object-fit: cover;' class='center responsive-img'><i style='font-size:27px'>"," ".$use['firstname']."</i><br>";

		echo "
	<a href='userdetails.php?myfriend=".$use['phonenumber']."' class='hoverable' style='font-size:22px;'>Profile</a>

	<button type='submit' name='submit' class='hoverable green-text text-darken-5' style='font-size:22px;border:0px;'>add friend</button><br><p></p><h1></h1>";
	?>
</form>
	<?php
				}
	}
}
}
}