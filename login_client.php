<!DOCTYPE HTML>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<html>
	<head>
		<title>Vehicle Rentals</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/user.css">
		<style>
			#page-wrapper{
				background-image: url("cust.jpg");
			}
			.h1{
				color:white;
			}
			h1, h2,h3,h4,h5,h6{
				color:black;
			}
		</style>
	</head>
	<body class="landing is-preload">
			<div id="page-wrapper">
					<header id="header" class="alt">
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="admin login.php">Add Driver</a></li>
											<li><a href="main.php">Add Vehicle</a></li>
											<li><a href="logout.php" name="logout">Log out</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

			 <div class="bg">
					<section id="banner">
						<div class="inner">
							<h2 style="color:white;">Vehicle Rentals</h2>
							<p>Always say yes to new adventures<br />
						</div>
						<a href="#three" class="more scrolly"></a>
					</section>
				</div>

				<div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Vehicles</h3>
<br>
        <section class="menu-content" id="three">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $ac_price = $row1["ac_price"];
                    $ac_price_per_day = $row1["ac_price_per_day"];
                    $non_ac_price = $row1["non_ac_price"];
                    $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu c1">
            

            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Vehicled image cap">
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> AC Fare: <?php echo ("Rs. " . $ac_price . "/km & Rs." . $ac_price_per_day . "/day"); ?></h6>
            <h6> Non-AC Fare: <?php echo ("Rs. " . $non_ac_price . "/km & Rs." . $non_ac_price_per_day . "/day"); ?></h6>
            </div> 
            </a>
            <?php }}
            else {
                ?>
                 <h1> No Vehicles available :( </h1>
                <?php
            }
            ?>                                   
        </section>
                    
    </div>
	</div>
					</section>
					
					<footer id="footer">
						
					</footer>

			</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>