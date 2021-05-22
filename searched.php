<!DOCTYPE html>
<html>
<head>
	<title>search result</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="materialize/js/materialize.min.js">
	<link rel="stylesheet" type="text/css" href="materialize/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>
			<style type="text/css">
				body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
				::placeholder{
					color: black;
					font-size: 20px;
				}
		    </style>
</head>
<body>
	<h3>Search results</h3>
	<?php
        session_start();
        include 'conn.php';
        if(isset($_POST['search'])){
        $search=$_POST['search'];
  $query=mysqli_query($conn,"select * from users where phonenumber LIKE '%".$search."%' or firstname LIKE '%".$search."%' or lastname LIKE '%".$search."%' or  livingplace LIKE '%".$search."%' or  position LIKE '%".$search."%'");
while($row=mysqli_fetch_array($query)) {
   if($row['phonenumber']===$_SESSION['id']){
   	echo "you are looking for me";
   }
   elseif($row['phonenumber']!==$_SESSION['id']){
	echo "<b>".$row['firstname']." ".$row['lastname']." </b>From <b>".$row['livingplace']." </b>Working at <b>".$row['position']."</b><p></p>";
	}
}}
	?>
</body>
</html>