<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<body>
<?php 
$a=$_POST['d_name'];
  $x=mysqli_query($conn,"select * from renteddriver where driver='$a'");
  while($row=mysqli_fetch_array($x)){?>

  <input type="hidden" id="lat" value=<?php echo $row['latitude'];?>>
  <input  type="hidden" id="lon" value=<?php echo $row['longitude'];?>>
  <?php }
  ?>
<iframe width="100%" height="1000   " id="l1" src=""></iframe>
 <div style="padding-left:700px;"> <input type="submit" name="submit_coordinates"></div>
</form>
<script>
var lo=document.getElementById("l1")
var lat=document.getElementById("lat").value
var lon=document.getElementById("lon").value
var l5=document.getElementById("t1")
var l6=document.getElementById("t2")
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
<?php 
  $x="select latitude from renteddriver where driver='james'";
  $conn->query($x);
  ?>

function showPosition(position) {
  lo.src="https://maps.google.com/maps?q="+lat+","+lon+"&output=embed"
}
var myInterval = setInterval(getLocation, 10000);
</script>

</body>
</html>

