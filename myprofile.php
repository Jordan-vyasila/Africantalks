<div class="card-panel">
<center>
	<i>my profile:<b><?php echo " ".$row['firstname']." ".$row['lastname']; ?></b></i>
<div  id="cover" class="center">
	<img src="images/<?php echo $row["image"]; ?>" style="border-radius: 50%; width: 90px; height: 90px; border: 9px solid white;margin-left:-14px; margin-top: -7px;object-fit: cover;" alt="profile_image" class="left">
</div>
<p class="">
	<span class=""><?php echo " Username: <b>".$row['username']."</b>"; ?></span><br>

	<span class=""><?php echo " From: <b>".$row['livingplace']."</b>"; ?></span><br>

	<span class=""><?php echo " Occupation: <b>".$row['position']."</b>"; ?></span><br>

	<span class=""><?php echo " Birth date: <b>".$row['birthdate']."</b>"; ?></span><br>

	<span class=""><?php echo " Gender: <b>".$row['gender']."</b>"; ?></span><br>

	<span class=""><?php echo " Email address: <b>".$row['emailaddress']."</b>"; ?></span><br>
</p>
</center><br>
</div>