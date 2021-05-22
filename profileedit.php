<center><h4>Edit profile</h4></center>
<div class="row">
	<div class="col l6 m6 s12">
		<table>
	<form method="POST" action="editprofilepicture.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Profile picture</h6>
		     <input type="file" name="file" style="width:90%; font-size: 20px;" class="grey lighten-3" title="enter birth date" required>
		 </td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="ep" value="Edit">
		</td>
	</tr>
	</form>
</table>

<table>
	<form method="POST" action="editcoverpicture.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Cover photo</h6>
			<input type="file" name="file" style="width:90%; font-size: 20px;" class="grey lighten-3" title="enter birth date" required>
		</td>
		<td  class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="coverp" value="Edit">
		</td>
	</tr>
	</form>
</table>

<table>
	<form method="POST" action="editusername.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Username</h6>
			<input type="text" name="username" placeholder="<?php echo $row["username"]; ?>" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3" title="enter place your living" onfocus="this.placeholder=''" >
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="" value="Edit">
		</td>
	</tr>
	</form>
</table>        

<table>
	<form method="POST" action="editbirthdate.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Date of birth</h6>
			<input type="date" name="birthdate" placeholder="<?php echo $row["birthdate"]; ?>" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3" title="enter birth date" required>
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="" value="Edit">
		</td>
	</tr>
	</form>
</table>
</div>


	<div class="col l6 m6 s12">
<table>
	<form method="POST" action="editlivingplace.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Living place</h6>
			<input type="text" name="livingplace" placeholder="<?php echo $row["livingplace"]; ?>" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3" title="enter place your living" onfocus="this.placeholder=''" required>
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="" value="Edit">
		</td>
	</tr>
	</form>
</table>

<table>
	<form method="POST" action="editgender.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Gender</h6>
		<div class="custom-select grey lighten-3" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;">
						  <select name="gender">
						    <option value=""><?php echo $row["gender"]; ?></option>
						    <option value="Male" class="grey">Male</option>
						    <option value="Female" class="grey">Female</option>
						    <option value="Others" class="grey">Others</option>
						  </select>
						</div>
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="" value="Edit">
		</td>
	</tr>
	</form>
</table>

<table>
	<form method="POST" action="editposition.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Occupation</h6>
			<input type="text" name="position" placeholder="<?php echo $row["position"]; ?>" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3" title="enter your position" maxlength="100" autocomplete="on" onfocus="this.placeholder=''" required>
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
			<input type="submit" name="" value="Edit">
		</td>
	</tr>
	</form>
</table>

<table>
	<form method="POST"  id="regForm" action="changepassword.php" enctype="multipart/form-data">
	<tr style="border: none;">
		<td>
			<h6 style="font-size: 27px">Password</h6>
		  <div class="tab">
		    <p><input type="password" placeholder="Old Password" oninput="this.className = ''" name="password" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3"></p>
		  </div>
		  <div class="tab">
		    <p><input type="password" placeholder="New Password" oninput="this.className = ''" name="npassword" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3"></p>
		  </div>
		  <div class="tab">
		    <p><input type="password" placeholder="Confirm new Password" oninput="this.className = ''" name="cnpassword" style="width:90%; height: 30px; border:1px solid; border-radius: 4px; font-size: 20px;" class="grey lighten-3"></p>
		  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:-20px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
		</td>
		<td class="right" style="margin-top: 50%; font-size: 20px;">
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
		</td>
	</tr>
	</form>
</table>
</div>
</div>