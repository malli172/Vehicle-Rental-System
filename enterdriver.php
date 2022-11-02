<?php
session_start();
require 'connection.php';
$conn = Connect();
error_reporting(0);
if(isset($_POST['submit'])) {
  $driver_name = $conn->real_escape_string($_POST['driver_name']);
  $dl_number = $conn->real_escape_string($_POST['dl_number']);
  $driver_phone = $conn->real_escape_string($_POST['driver_phone']);
  $driver_address = $conn->real_escape_string($_POST['driver_address']);
  $driver_gender = $conn->real_escape_string($_POST['driver_gender']);
  $driver_availability = "yes";
  $username='jenny';
$query = "SELECT driver_name, dl_number FROM driver WHERE driver_name='$driver_name' AND dl_number='$dl_number' LIMIT 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if ($count == 0) {
$query = "INSERT into driver(driver_name,dl_number,driver_phone,driver_address,driver_gender,client_username,driver_availability,d_password) VALUES('" . $driver_name . "','" . $dl_number . "','" . $driver_phone . "','" . $driver_address . "','" . $driver_gender ."','" . $username ."','" . $driver_availability ."','" . $driver_phone . "')";
$success = $conn->query($query);
$x=0;
$y=0;
$q1="INSERT into rented(driver,latitude,longitude) VALUES('".$driver_name."','".$x."','".$y."')";
$conn->query($q1);
?>
<script>alert('success');</script>;
<?php
}
else{ ?>
     <script> alert("Vehicle with the same vehicle number already exists");
        location.replace("enterdriver.php");</script>
</div>
<?php	
}

$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<style>
      h1,#header nav ul li a {
        color:black;
        border-shadow:black;
      }
      </style>
<body class="index is-preload">
		<div id="page-wrapper">
				<header id="header" class="alt">
					<h1 id="logo"><a href="#">Vehicle<span> Rentals</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="customerlogin.php">Welcome <?php 
                if(isset($_SESSION['username'])){
					echo $_SESSION['username'];   }
					 ?></a></li>
							<li class="current">
								<a href="mybooking.php">My Bookings</a>
							</li>
							<li class="current">
								<a href="addvehicle.php">Add Vehicle</a>
							</li>
							<li class="current">
								<a href="enterdriver.php">Join as driver</a>
							</li>
							<li><a href="logout.php" class="button primary">Log out</a></li>
						</ul>
					</nav>
				</header>
 <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
  <br><br>

    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Enter Driver Details </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required>
          </div>

           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add Driver</button>    
        </form>
      </div>
    </div>
</body>

</html>