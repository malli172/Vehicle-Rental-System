<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
    <title>Add Vehicle</title>
    <style>
      h1,#header nav ul li a {
        color:black;
        border-shadow:black;
      }
      </style>
</head>
<body class="index is-preload">
		<div id="page-wrapper">
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.html">Vehicle<span> Rentals</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="customerlogin.php">Welcome <?php 
                if(isset($_SESSION['username'])){
					echo $_SESSION['username'];   }
					 ?></a></li>
							<li class="current">
								<a href="#">My Bookings</a>
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
                </div>
      <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            
    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form"   action="addvehicle2.php"enctype="multipart/form-data" method="POST">
        <br style="clear: both">
        <br><br><br>
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Please Provide Your Vehicle Details. </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Vehicle Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required>
          </div>     
          <div class="form-group">
            <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost per day (Rs)" required>
          </div>


          <div class="form-group">
            <input name="uploadedimage" type="file">
          </div>
           <button type="submit" id="submit" name="submit" class="btn btn-success pull-right"> Submit for Rental</button>    
        </form>
      </div>
    </div>

</body>
</html>