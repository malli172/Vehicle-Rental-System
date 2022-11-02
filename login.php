<?php
    include 'config.php';
    error_reporting(0);
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	$sql = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
	$result =$conn->query($sql);
	$count=mysqli_num_rows($result); 
	if ($count > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		echo "You are successfully logged in";
	} else {
        echo "<script> alert('Invalid');</script>";
		header('Location:main.php');
	}
?>