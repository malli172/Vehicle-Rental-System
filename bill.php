<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>
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
<script src="ScriptForPdf.js"></script>
<style>
      h1,#header nav ul li a {
        color:black;
        border-shadow:black;
      }
      input[type="button"], input[type="submit"], input[type="reset"], button, .button {
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    -moz-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    -webkit-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    -ms-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    background: none;
    border: solid 1px;
    border-radius: 0;
    color: inherit;
    cursor: pointer;
    display: inline-block;
    font-size: 0.8em;
    font-weight: 900;
    letter-spacing: 2px;
    min-width: 18em;
    padding: 0 0.75em;
    line-height: 2.75em;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
}

      </style>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="ScriptForPdf.js"></script>

    </head>
<body class="index is-preload">

		<div id="page-wrapper">
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.html">Vehicle<span> Rentals</span></a></h1>
					<nav id="nav">
						<ul>
                if(isset($_SESSION['username'])){
				 }
					 ?></a></li>
							<li class="current">
								<a href="mybookings.php">My Bookings</a>
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
                <br><br>
                <br><br>
    </nav>
<div id="Inner" >

    
                    <div class="container">
                        <?php
                        $p=$_POST['car'];
                        $sql4 = "SELECT * FROM  rentedcars WHERE vehicle_name='$p'";
                        $result4 = $conn->query($sql4);
                    
                    
                        if (mysqli_num_rows($result4) > 0) {
                            while($row = mysqli_fetch_assoc($result4)) {
                                $id = $row["id"];
                                $car_name = $row["vehicle_name"];
                                $car_nameplate = $row["numberplate"];
                                $driver_name = $row["driver_name"];
                                //$dl_number = $row["dl_number"];
                               // $client_name = $row["client_name"];
                               // $client_phone = $row["client_phone"];
                               $rent_start_date=$row["rent_start_date"];
                               $rent_end_date=$row["rent_end_date"];
                               $cost=$row["cost"];


                            }
                        }
                        ?>
        <h1 class="text-center">Bill</h1>
        <div style="border:2px solid black; margin-left:250px;  margin-right:250px;">
            <div class="col-md-10" style="float: none; margin: 0 auto; " align="center" >
            <br>
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4> <strong>Vehicle Number:</strong> <?php echo $car_nameplate; ?></h4>
                <br>
                
                

                
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Driver Name: </strong> <?php echo $driver_name; ?> </h4>
                <br>
                <h4> <strong>Cost : Rs </strong> <?php echo $cost; ?>/- </h4>
                <br>
                <!-- <h4> <strong>Driver License number: </strong>  <?php echo $dl_number; ?> </h4>
                <br> -->
                <!-- <h4> <strong>Driver Contact:</strong>  <?php echo $driver_phone; ?></h4>
                <br> -->
                <!-- <h4> <strong>Employee Name:</strong>  <?php echo $client_name; ?></h4>
                <br>
                <h4> <strong>Employee Contact: </strong> <?php echo $client_phone; ?></h4>
                <br> -->
            </div>
        </div>
				</header>
                    </div>
                </div>
    </nav>
                    </div>
                    
                    &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button onclick="getpdf()" align="center">Download</button>
                    </body>
                    </html>
