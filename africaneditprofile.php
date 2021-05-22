<?php
        session_start();
        include 'conn.php';
  $query=mysqli_query($conn,"select * from users where phonenumber='".$_SESSION['id']."'");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>africantalks edit profile</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="materialize/js/materialize.min.js">
	<link rel="stylesheet" type="text/css" href="materialize/font-awesome/css/font-awesome.min.css">
    <script src="materialize/compjquery-3.5.1.min.js"></script>
			<style type="text/css">
				body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
				::placeholder{
					color: black;
					font-size: 20px;
				}
				#cover{
					background-image: url('<?php if(empty($user['coverpicture'])===true){echo"coverphoto/".$row['coverpicture']; } ?>');
				    background-position: center;
				    background-repeat: no-repeat;
				    background-size: cover;
					width: 200px;
					height: 250px;
          border-radius: 5%;
          object-fit: cover;
				}
				[type="checkbox"] {
					color: red;
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
				#na{
					color: white;
				}
				#na:hover{
					background-color: green;
				}
				label{
					color: black;
					font-size: 15px;
				}
			/*	this is style of gender */
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid grey;
  border-color:grey lightgrey lightgrey lightgrey;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color:lightgrey lightgrey red lightgrey;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  font-size: 17px;
  color: black;
  padding: 8px 16px;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  font-size: 20px;
  position: absolute;
  background-color:grey;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
table {
  width: 100%;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
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
    <div class="col l4 m12 s12">
      <?php include 'myprofile.php'; ?>
    </div>
		<div class="col l8 m12 s12">
			<?php include 'profileedit.php'; ?>
		</div>
    <div class="col l12 m12 s12">
      <?php include 'myfriends.php'; ?>
    </div>
</div>
	      <?php include 'bottombar.php'; ?>


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
    document.getElementById("navbar").style.top = "-75px";
    document.getElementById("body").style.top = "0px";
  }
  prevScrollpos = currentScrollPos;
}
</script>


<!-- for gender selection -->
<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>




 <!-- for change password -->

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