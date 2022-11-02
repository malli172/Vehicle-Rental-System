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
      input[type="button"], input[type="submit"], input[type="reset"], button, .button {
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    -moz-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    -webkit-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    -ms-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    background: black;
    border: solid 1px;
    border-radius: 0;
    color: white;
    cursor: pointer;
    display: inline-block;
    font-size: 0.8em;
    font-weight: 900;
    letter-spacing: 2px;
    min-width: 18em;
    padding: 0 0.75em;
    line-height: 3.75em;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
}
select {
    writing-mode: horizontal-tb !important;
    font-style: ;
    font-variant-ligatures: ;
    font-variant-caps: ;
    font-variant-numeric: ;
    font-variant-east-asian: ;
    font-weight: ;
    font-stretch: ;
    font-size: ;
    font-family: ;
    text-rendering: auto;
    color: fieldtext;
    letter-spacing: normal;
    word-spacing: normal;
    line-height: 10;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    appearance: auto;
    box-sizing: border-box;
    align-items: center;
    white-space: pre;
    -webkit-rtl-ordering: logical;
    background-color: field;
    cursor: default;
    margin: 0em;
    border-width: 1px;
    border-style: solid;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
    border-radius: 0px;
}
.container{
  border:2px solid  black;
}
input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:hover, .button:hover {
    background:black;
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
    <table style="border=2px solid;">
    <br><br>
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form">
        <form role="form" action="bookingconfirm.php" method="POST">
        <br style="clear: both">
          <br>

        <?php
        $car_id = $_GET["id"];
        $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
                $car_name = $row1["car_name"];
                $car_nameplate = $row1["car_nameplate"];
                $cost = $row1["cost"];
                $_SESSION['cost']=$cost;
                $_SESSION['vehicle_name']=$car_name;
                $_SESSION['numberplate']=$car_nameplate;

            }
            
        }

        ?><div class="border">

          <!-- <div class="form-group"> -->
              <h5> Selected Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
         <!-- </div> -->
         
          <!-- <div class="form-group"> -->
            <h5> Number Plate:&nbsp;<b> <?php echo($car_nameplate);?></b></h5>
          <!-- </div>      -->
        <!-- <div class="form-group"> -->
        <?php $today = date("Y-m-d") ?>
          <label><h5>Start Date:</h5></label>
            <input type="date" name="rent_start_date" min="<?php echo($today);?>" required=""  id="s1">
            &nbsp; 
          <label><h5>End Date:</h5></label>
          <input type="date" name="rent_end_date" min="<?php echo($today);?>" required="" onclick="f2()" id="s2">
        <!-- </div>      --><br><br>

                <!-- <form class="form-group"> -->
              <label><h5>Select a driver: &nbsp;</h5></label>
                <select name="driver_id_from_dropdown" ng-model="myVar1">
                        <?php
                        $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' ";
                        $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $driver_id = $row2["driver_id"];
                                $driver_name = $row2["driver_name"];
                                $driver_gender = $row2["driver_gender"];
                                $driver_phone = $row2["driver_phone"];

                    ?>
  

                    <option value="<?php echo($driver_id); ?>"><?php echo($driver_name); ?>
                   

                    <?php }
                                $_SESSION['driver_name']= $driver_name;

                    } 
                    else{
                        ?>
                    Sorry! No Drivers are currently available, try again later...
                        <?php
                    }
                    ?>
                </select>
                <div ng-switch="myVar1">
                

                <?php
                        $sql3 = "SELECT * FROM driver WHERE driver_availability = 'yes'";
                        $result3 = mysqli_query($conn, $sql3);

                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $driver_id = $row3["driver_id"];
                                $driver_name = $row3["driver_name"];
                                $driver_gender = $row3["driver_gender"];
                                $driver_phone = $row3["driver_phone"];

                ?>

              
                <?php }} ?>
                </div>
                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                <br>
         
           <input type="submit"name="submit" value="Rent Now" class="btn btn-primary pull-right">  </div>   
        </form>
        <br><br><br><br>
      </div>
      <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">Rs. 500</span> for each day after the due date ends.</h6>
        </div>
    </div>
   </table>
</body>

</html>
<script type="text/javascript">
function getValue(x) {
  if(x.value == 'No'){
    document.getElementById("yourfield").style.display = 'none'; // you need a identifier for changes
  }
  else{
    document.getElementById("yourfield").style.display = 'block';  // you need a identifier for changes
  }
}
</script>