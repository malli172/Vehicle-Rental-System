<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body{
        background-image:url("https://i.pinimg.com/originals/d4/3c/11/d43c11d76c7db33af616426597e88833.gif");
        background-attachment:fixed;
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
      }
      </style>

</head>
<body onload="getLocation()" >
<form method="get" id="jsform">
<input type="hidden" value="" id="f1" name="lat">
<input type="hidden" value="" id="f2" name="long">

</form>
<?php
   $x =$_GET['lat'];
   $y=$_GET['long'];
   $z=$_SESSION['d_username'];
  $sql3 = "UPDATE rented SET latitude='$x',longitude='$y' where driver='$z'" ;
  $conn->query($sql3);

?>

<script>
var x1 = document.getElementById("demo");
var x = document.getElementById("f1");
var y = document.getElementById("f2");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x1.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

x.value=lat=position.coords.latitude
y.value=position.coords.longitude
document.getElementById('jsform').submit();

 
}

var myInterval = setInterval(getLocation, 1000000);

  

</script>


</body>
</html>

