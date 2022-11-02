<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/customerlogin.css" />
		<style>
			.menu-content {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  justify-items: center;
}

.sub-menu {
  background: #fff;
  box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
  width: 270px;
  height: 310px;
  padding: 1.5rem;
  text-align: center;
}

.sub-menu:hover {
  box-shadow: 0 1px 20px rgba(104, 104, 104, 0.8);
}

.card-img-top {
  max-height: 150px;
  max-width: 230px;
  min-height: 150px;
  min-width: 230px;
  z-index: 0;
}

@media (max-width: 756px) {
  .sub-menu {
    width: 100%;
    height: 100%;
  }
  .box {
    width: 100%;
  }
}
</style>
		<title>Customer</title>
	</head>
	<body class="index is-preload">
		<div id="page-wrapper">
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.html">Vehicle<span> Rentals</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="index.html">Welcome <?php 
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
				<section id="banner">
					<div class="inner">

						<header>
							<h2 style="color:white;">At your Service - 24/7</h2>
						</header>
					
						<footer>
							<ul class="buttons stacked">
								<li><a href="#three" class="button fit scrolly">Start Booking</a></li>
							</ul>
						</footer>

					</div>

				</section>

				<!-- <article id="main">

						<section class="wrapper style2 container special-alt">
							<div class="row gtr-50">
								<div class="col-8 col-12-narrower">

									<header>
										<h2>Behold the <strong>icons</strong> that visualize what you’re all about. or just take up space. your call bro.</h2>
									</header>
									<p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu comteger ut fermentum lorem. Lorem ipsum dolor sit amet. Sed tristique purus vitae volutpat ultrices. eu elit eget commodo. Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo.</p>
									<footer>
										<ul class="buttons">
											<li><a href="#" class="button">Find Out More</a></li>
										</ul>
									</footer>

								</div>
								<div class="col-4 col-12-narrower imp-narrower">

									<ul class="featured-icons">
										<li><span class="icon fa-clock"><span class="label">Feature 1</span></span></li>
										<li><span class="icon solid fa-volume-up"><span class="label">Feature 2</span></span></li>
										<li><span class="icon solid fa-laptop"><span class="label">Feature 3</span></span></li>
										<li><span class="icon solid fa-inbox"><span class="label">Feature 4</span></span></li>
										<li><span class="icon solid fa-lock"><span class="label">Feature 5</span></span></li>
										<li><span class="icon solid fa-cog"><span class="label">Feature 6</span></span></li>
									</ul>

								</div>
							</div>
						</section>
						</section> -->
<div style="h1,h2,h3,h4,h5 { color: black;">
						<section class="wrapper style3 container special">
						<section class="menu-content" id="three">

            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $cost = $row1["cost"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu c1">
            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Vehicled image cap">
            <h5 class="h5"><b> <?php echo $car_name; ?> </b></h5>
            <h6> Cost per day: <?php echo $cost; ?></h6>
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

						


				</article>

			<!-- CTA
				<section id="cta">

					<header>
						
					</header>
					<footer>
						<ul class="buttons">
							<li><a href="#" class="button primary">Take My Money</a></li>
							<li><a href="#" class="button">LOL Wut</a></li>
						</ul>
					</footer>

				</section> -->

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>