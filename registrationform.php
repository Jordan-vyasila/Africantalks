<div class="container margin">
				<form method="POST" action="registrationform2.php"  id="regForm" enctype="multipart/form-data" class="center">
				<div class="row">
		  <div class="tab">
					<input type="text" name="firstname" placeholder="First name" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter first name" maxlength="25" autocomplete="off" onfocus="this.placeholder=''" required><br>

					<input type="text" name="lastname" placeholder="Last name" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter last name" maxlength="25" autocomplete="on" onfocus="this.placeholder=''" required><br>
		  </div>
		  <div class="tab">
					<input type="email" name="emailaddress" placeholder="Email address" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter email" maxlength="25" autocomplete="on" onfocus="this.placeholder=''" required><br>

					<input type="text" name="phonenumber" placeholder="Phone number" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter phone number" maxlength="13" autocomplete="off" onfocus="this.placeholder=''" required><br>
		  </div>
		  <div class="tab">
          
					<input type="password" name="password" placeholder="Password" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter password" maxlength="8" autocomplete="on" onfocus="this.placeholder=''" required><br>

					<input type="password" name="confirmpassword" placeholder="Confirm password" style="width:50%; height: 50px; border:1px solid; border-radius: 4px; font-size: 29px;" class="white" title="enter password" maxlength="8" autocomplete="on" onfocus="this.placeholder=''" required><br>
          </div>

  <div style="overflow:auto; margin-right: 40%; font-size: 26px;" class="center">
    <div style="float:right;">
      <button type="button" id="prevBtn" class="red lighten-3 hoverable" onclick="nextPrev(-1)"><b style="font-size: 20px;">Previous</b></button>
      <button type="button" id="nextBtn" class="green lighten-3 hoverable" onclick="nextPrev(1)"><b style="font-size: 20px;">Next</b></button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:10px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
 <p style="font-size: 26px;margin-top: -16px"><b>Already have an account! <u><a href="#login" onclick="window.location.href='index.php'" class="hoverable">login here</a></u></b></p><p></p>
				    <i style="font-size: 26px">Copyright &copy; <i><?php echo date("Y");?></i> African Talks.  All Rights Reserved</i>

					
				</form>
</div>

