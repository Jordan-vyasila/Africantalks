
		<div class="card-panel">
      <?php 
   if(date("m-d", strtotime("1 hour -1 minute"))===date("m-d",strtotime($row['birthdate']))){
   echo "
<div class='bd' style='margin-top:-26px'><i class='white-text fa fa-heart'>Happy<br>Birthday</i></div>";
   } ?>
              <a href="#"onclick="window.location.href='africaneditprofile.php'" class="right" style="margin-top: -20px; font-size: 19px;"><button class="fa fa-edit">Edit Profile</button></a>
              <p></p>
              <a href="#" class="center" style="font-size: 30px"><b>My Profile</b></a>
              <center>   	
                  <div  id="cover" class="center">
		              <img src="images/<?php echo $row["image"]; ?>" alt="profile_image" style="border-radius: 50%; width: 90px; height: 90px; border: 9px solid white;margin-left:-14px; margin-top: -7px;object-fit: cover;" class="left">
	             </div>
              </center>
           
			  <p class="center">
			  	<a href="#" class="hoverable">
			  		<button style="width: 100%; height: 25px; font-size: 19px;" class="fa fa-book"><b> My Diary</b></button></a><p></p>

          <a href="#" class="hoverable">
            <button style="width: 100%; height: 25px; font-size: 19px;" class="fa fa-user"><i class="fa fa-user" style="font-size: 14px;"></i> <b> My Friends</b></button></a><p></p>

          <a href="#" class="hoverable">
            <button style="width: 100%; height: 25px; font-size: 19px;" class="fa fa-group"><b>My Groups</b></button></a><p></p>

          <a href="#" class="hoverable">
            <button style="width: 100%; height: 25px; font-size: 19px;" class="fa fa-image"><b> My Photos</b></button></a><p></p>

			  	<a href="#" class="hoverable">
			  		<button style="width: 100%; height: 25px; font-size: 19px;" class="fa fa-newspaper-o"><b> My Pages</b></button></a><p></p>
			  </p>
			 

			  <div style="border: none;outline: 1;display: inline-block;color: white;background-color: teal;text-align: center;cursor: pointer;width: 100%;font-size: 14px; margin-bottom: 5%">
          <p>Today: <i id="date"></i></p>

          <script>
              var d = new Date();
             document.getElementById("date").innerHTML = d.toDateString();
          </script>
			  </div>
		</div>



 <!-- for change Diary password -->

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>