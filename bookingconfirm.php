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
<body class="index is-preload" ng-app="">
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
                </div>

<?php


    $driver_id = $_POST['driver_id_from_dropdown'];
    $customer_username = $_SESSION["username"];
    $car_id = $conn->real_escape_string($_POST['hidden_carid']);
    $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
    $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
    $c=$_SESSION['cost'];
    $d=$_SESSION['driver_name'];
    $v=$_SESSION['vehicle_name'];
    $num=$_SESSION['numberplate'];
    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }
    
    $err_date = dateDiff("$rent_start_date", "$rent_end_date");

    $sql0 = "SELECT * FROM cars WHERE car_id = '$car_id'";
    $result0 = $conn->query($sql0);

    if($err_date >= 0) { 
    $sql1 = "INSERT into rentedcars(customer_username,car_id,driver_id,booking_date,rent_start_date,rent_end_date,cost,no_of_days,driver_name,vehicle_name,numberplate) VALUES('" . $customer_username . "','" . $car_id . "','" . $driver_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $c * $err_date. "','" . $err_date. "','" . $d. "','" . $v. "','" . $num. "')";
    $result1 = $conn->query($sql1);
    $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_id = '$car_id'";
    $result2 = $conn->query($sql2);
    echo "<script>alert($d)</script>";
    if($d!='self') {
    $sql3 = "UPDATE driver SET driver_availability = 'no' WHERE driver_id = '$driver_id'";
    $result3 = $conn->query($sql3);
    }
    $sql4 = "SELECT * FROM  cars c, clients cl, driver d, rentedcars rc WHERE c.car_id = '$car_id' AND d.driver_id = '$driver_id' AND cl.client_username = d.client_username";
    $result4 = $conn->query($sql4);


    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
            $id = $row["id"];
            $car_name = $row["car_name"];
            $car_nameplate = $row["car_nameplate"];
            $driver_name = $row["driver_name"];
            $driver_gender = $row["driver_gender"];
            $dl_number = $row["dl_number"];
            $driver_phone = $row["driver_phone"];
            $client_name = $row["client_name"];
            $client_phone = $row["client_phone"];
        }
    }

    if (!$result1 | !$result2 | !$result3){
        die("Couldnt enter data: ".$conn->error);
    }

?>
<br>
<br>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for using Car Rental System! We wish you have a safe ride. </h2>

 

    <h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$id"; ?></span> </h3>


    <div class="container">
        <h5 class="text-center">Please read the following information about your order.</h5>
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: orange;">Your booking has been received and placed into out order processing system.</h3>
                <br>
                <h4>Please make a note of your <strong>order number</strong> now and keep in the event you need to communicate with us about your order.</h4>
                <br>
                <h3 style="color: orange;">Invoice</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4> <strong>Vehicle Number:</strong> <?php echo $car_nameplate; ?></h4>
                <br>
                
                

                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Driver Name: </strong> <?php echo $driver_name; ?> </h4>
                <br>
                <h4> <strong>Driver Gender: </strong> <?php echo $driver_gender; ?> </h4>
                <br>
                <h4> <strong>Driver License number: </strong>  <?php echo $dl_number; ?> </h4>
                <br>
                <h4> <strong>Driver Contact:</strong>  <?php echo $driver_phone; ?></h4>
                <br>
                <h4> <strong>Employee Name:</strong>  <?php echo $client_name; ?></h4>
                <br>
                <h4> <strong>Employee Contact: </strong> <?php echo $client_phone; ?></h4>
                <br>
            </div>
        </div>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6>Warning! <strong>Do not reload this page</strong> or the above display will be lost. If you want a hardcopy of this page, please print it now.</h6>
        </div>
    </div>
</body>
                <?php } ?>
</html>