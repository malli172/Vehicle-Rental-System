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
a{
  text-decordation:none;
  border-bottom:none;
}
input[type="password"], input[type="email"], textarea {
    -moz-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -webkit-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -ms-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    background: none;
    border: solid 1px rgba(124, 128, 129, 0.2);
    border-radius: 0;
    color: inherit;
    display: block;
    text-decoration: none;
    width: 40%;
    outline: none;
}
input[type="text"]{
    -moz-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -webkit-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -ms-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    background: none;
    border: solid 1px rgba(124, 128, 129, 0.2);
    border-radius: 0;
    color: inherit;
    display: block;
    padding: 0.75em;
    text-decoration: none;
    width: 40%;
    outline: 0;
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
    </nav>
    
<?php $login_customer = $_SESSION['username']; 

    $sql1 = "SELECT * FROM rentedcars rc, cars c
    WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id ";
    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1) > 0) {
?>
<div class="container">
  <br><br><br>
      <div class="jumbotron">
        <h1 class="text-center">Your Bookings</h1>
        <p class="text-center"> Hope you enjoyed our service </p>
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="15%">Car</th>
<th width="15%">Start Date</th>
<th width="15%">End Date</th>
<th width="15%">Number of Days</th>
<th width="15%">Total Amount</th>

</tr>
</thead>
<br><br>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_name"];  $x=$row["car_name"];?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td><?php echo $row["no_of_days"]; ?> </td>
<td>Rs.  <?php echo $row["cost"] * $row["no_of_days"]; ?></td>
<td><form action="bill.php" method="post"> <button type="submit" value="<?php echo $row['car_name']?>" name="car">Bill</button></form></td>

</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else {
            ?>
        <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">You have not rented any cars till now!</h1>
        <p class="text-center"> Please rent cars in order to view your data here. </p>
      </div>
    </div>

            <?php
        } ?>   
        <div align="center">
          <br>
          <form method="post" action="locate.php">
      <label >Enter driver username</label> <br><br><input type="text" name="d_name" placeholder="Enter driver username">
      <br>
      <label >Enter Vehicle number</label> <br><br><input type="text" name="d_name" placeholder="Enter vehicle number">
      <br>
       <input type="submit" value =" Check vehicle status "></div>
      </form>
   <br><br>

</body>

</html>