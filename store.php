<form method="POST" action="removefriendrequest.php?requested=<?php echo $user['user'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
	<?php 
		$friend=mysqli_query($conn,"select * from friendrequest join friends where friendrequest.requester='".$_SESSION['id']."' and friendrequest.requested='".$user['user']."'");
if ($r=mysqli_fetch_assoc($friend)) {
	echo "
	<a href='userdetails.php?myfriend=".$r['requested']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'>View Profile</a>
	<button type='submit' name='submit' class='fa fa-user-plus green-text'>Friend request...</button><br><p></p>";
 }
	else{ ?>
	</form>
	<form method="POST" action="addfriend.php?requested=<?php echo $user['user'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
		<?php 
		if($user['user']===$_SESSION['id']){
			echo "my post<br><p></p>";
		} 
			else{
				$a=mysqli_query($conn,"select * from friends where me in('".$user['user']."') or myfriend in('".$user['user']."')");
				if($t=mysqli_fetch_assoc($a)){
					echo "
	<a href='frienddetails.php?myfriend=".$t['myfriend']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'><sup></sup>View Profile</a><br><p></p> my friend";
				}
				else{
				$b=mysqli_query($conn,"select * from friendrequest where requested='".$_SESSION['id']."' and requester='".$user['user']."'");
				if($see=mysqli_fetch_assoc($b)){
					echo "
	<a href='confirmfriend.php?myfriend=".$see['requester']."' class='fa fa-user red white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'><sup>&#xf128;</sup>Confirm friend</a>

	<a href='userdetails.php?myfriend=".$see['requester']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'>View Profile</a><br><p></p>";
				}
					else{
		echo "
	<a href='userdetails.php?myfriend=".$see['requested']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'><sup></sup>View Profile</a>

	<button type='submit' name='submit' class='fa fa-user-plus green-text'>add friend</button><br><p></p>"; 
}
	}}
}?>
	</form>





<?php
$fr=mysqli_query($conn,"select me,myfriend from friends where me='".$_SESSION['id']."' or myfriend='".$_SESSION['id']."'");
if(mysqli_num_rows($fr)>0){
	while($isf=mysqli_fetch_assoc($fr)){
		if(($isf['me']===$_SESSION['id'] && $isf['me']===$user['user']) or($isf['myfriend']===$_SESSION['id'] && $isf['myfriend']===$user['user'])){
			echo "";
		}
		elseif(($isf['me']===$_SESSION['id'] && $isf['myfriend']===$user['user']) or ($isf['myfriend']===$_SESSION['id'] && $isf['me']===$user['user']) or ($isf['myfriend']===$_SESSION['id'] && $isf['me']===$user['user'])){
		     echo "myfriend";
		}
		elseif(($isf['me']!==$_SESSION['id'] or $isf['myfriend']===$_SESSION['id']) or ($isf['me']!==$_SESSION['id'] and $isf['myfriend']!==$_SESSION['id'])){

			$frr=mysqli_query($conn,"select me,myfriend from friends where me='".$user['user']."' or myfriend='".$user['user']."'");
			if($bb=mysqli_fetch_assoc($frr)){
				if($bb['me']===$_SESSION['id']){
					echo "";
				}
				elseif($user['user']!==$_SESSION['id']){
					echo "nn";
				}
				}
			else{
				echo "mmmm";
			}
		}
		else {
			$fr2=mysqli_query($conn,"select me,myfriend from friends where me!='".$_SESSION['id']."' and myfriend!='".$_SESSION['id']."' limit 1");
            if(mysqli_num_rows($fr2)>0){
	          if($isf2=mysqli_fetch_assoc($fr2)){
		         if(($isf2['me']!==$_SESSION['id'] and $isf2['myfriend']!==$_SESSION['id'])){
		         	echo "string";
		         }

	       }
         }
     }
	}




	//FRIEND REQUEST 
	$request=mysqli_query($conn,"select * from friendrequest where requested='".$user['user']."' or requester='".$user['user']."'");
	if($req=mysqli_fetch_assoc($request)){
       if($user['user']===$_SESSION['id'] && $req['requester']===$_SESSION['id']){
       	echo "My Post<br>";
       }
       elseif($user['user']===$req['requested'] && $req['requested']===$_SESSION['id']){
       	echo "my post";
       }
       elseif($user['user']===$req['requested'] && $req['requester']===$_SESSION['id']){
       	echo "send req";
       	?>
       	<!-- remove friend request -->
	<form method="POST" action="removefriendrequest.php?requested=<?php echo $user['user'];  ?>">
	<input type="text" name="requester" value="<?php echo $_SESSION['id'];?>" hidden>
	<?php echo"<a href='userdetails.php?myfriend=".$req['requested']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'>View Profile</a>
	<button type='submit' name='submit' class='fa fa-user-plus green-text'>Friend request...</button><br><p></p>";
	?>
	<!-- Confirm a friend request -->
	</form>
	<?php
       }
       elseif($user['user']===$req['requester'] && $req['requested']===$_SESSION['id']){
       	echo "
	<a href='confirmfriend.php?myfriend=".$req['requester']."' class='fa fa-user red white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'><sup>&#xf128;</sup>Confirm friend</a>

	<a href='userdetails.php?myfriend=".$req['requester']."' class='fa fa green white-text lighten-2' style='padding:2px 10px 2px 10px; border: 1px solid grey;border-radius: 3px;'>View Profile</a><br><p></p>";
       }
}