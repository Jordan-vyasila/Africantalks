<div class="row">
	<div class="col l12 m12 s12">
<form method="POST" action="searched.php">
	<div class="row">
	<div class="col l10 m10 s10">
	<input type="text" name="search" class="right grey lighten-2" style="border: 1px solid black;height: 30px; border-radius: 5%;" required>
    </div>
	<div class="col l1 m1 s1">
	<button class="fa fa-search" style="height: 32px;margin-left: -24px"></button>
    </div>
    </div>
</form>
</div>
<div class="col l4 m4 s4">
	<i class="fa fa-bell" style="font-size: 14px"><sup>12</sup><br><i class="">Notifications</i></i>
</div>
<div class="col l4 m4 s4">
	<i class="fa fa-envelope" style="font-size: 14px"><sup>1</sup><br><i class="">Messages</i></i>
</div>
<div class="col l4 m4 s4">
	<i class="fa fa-bookmark" style="font-size: 14px"><sup>198</sup><br><i class="">Saved</i></i>
</div>
</div>
<?php
echo date("Y-m-d h:i:sa", strtotime("tomorrow")) . "<br>";

echo date("Y-m-d H:i:sa", strtotime("1 hour 0 minute 0 seconds")) . "<br>";

echo date("Y-m-d h:i:sa", strtotime("-13 Months")) . "<br>";
?>

<div class="row">
		<?php
	$frr=mysqli_query($conn,"select * from friendrequest where requested='".$_SESSION['id']."'");
	if(mysqli_fetch_assoc($frr)){
		echo "
	<div class='col l12 m12 s12 grey lighten-3 card-panel'>
		<h5 class='black-text'>Friend requests</h5>
		<p class=''>";

	$req=mysqli_query($conn,"select * from friendrequest join users where users.phonenumber=friendrequest.requester and friendrequest.requested='".$_SESSION['id']."' order by requestedtime desc limit 5");
	while ($rq=mysqli_fetch_assoc($req)) {
		echo "
	<a href='#'>
	<img src='images/".$rq['image']."'  style='vertical-align: bottom;width: 40px;height: 36px;border-radius: 10%;object-fit: cover;' class='center responsive-img'>
	<u><b class='indigo-text hoverable'>".$rq['firstname'],"</b></u></a><br>
	<a href='frienddetails.php?myfriend=".$rq['requester']."'>Profile</a>
	<a href='confirmfriendr.php?myfriend=".$rq['requester']."'>Confirm</a>
	<a href='deleterequestr.php?myfriend=".$rq['requester']."'>Delete</a><br><hr>";

	}
	echo "<a href='#' class='right'>View More</a>";
	}
	else{
		echo "";
	}
	 ?>
		</p>
	</div>
</div>
