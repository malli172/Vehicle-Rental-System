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
			b{
				color:black;
			}
			li{
				text-decoration:none;
				float:left;
			}
			ul{
				display:flex;
				list-style-type:none;
			}
			
a {
    -moz-transition: color 0.2s ease, border-bottom-color 0.2s ease;
    -webkit-transition: color 0.2s ease, border-bottom-color 0.2s ease;
    -ms-transition: color 0.2s ease, border-bottom-color 0.2s ease;
    transition: color 0.2s ease, border-bottom-color 0.2s ease;
    border-bottom: none;
    color: inherit;
    text-decoration: none;
}
		</style>
	</head>
	<body class="landing is-preload">
			<div id="page-wrapper">
					<header id="header" class="alt">
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span></span></a>
									<div id="menu">
										<ul>
										<li><a href="index.html">Home</a></li>
											<li><a href="admin login.php">Admin Log In</a></li>
											<li><a href="main.php">Customer Log In</a></li>
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
<br>
<br>
<br>

<ul id="ul">
	<li ><a href="main.php">

<image src="2.jpg" height="300px" style="padding-left:30px;">

		<h1 style="padding-left:50px;">Customer Login</h1></a></li>	 &emsp;&emsp; &emsp;&emsp;
	<li ><a href="admin login.php">
<image src="1.jpg" height="300px" style="padding-left:100px;">
	<h1 style="padding-left:150px;">Admin Login</h1></a></li>&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; 
	<li ><a href="driverlogin.php">
<image src="dr.jpg" height="300px" style="padding-left:100px;">
	<h1 style="padding-left:220px;">Driver Login</h1></a></li>

		</ul>
        <section class="menu-content" id="three">
            
	</div>
					</section>
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