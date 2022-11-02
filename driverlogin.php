<?php
session_start();
$db= mysqli_connect('localhost', 'root', '', 'carrentalp') or die("Connection Failed");
	if(isset($_POST['login'])){		
		$uname=$_POST['username'];
        $pass=$_POST['password'];
		$query = "SELECT driver_name, d_password FROM driver WHERE driver_name='$uname' AND d_password='$pass' LIMIT 1";
        $result = mysqli_query($db, $query);
	    $count = mysqli_num_rows($result);
	  if ($count == 1) {
            $_SESSION['d_username'] = $uname;
            header("Location:location.php");
            
      }
        
        else{
           echo "<script> alert('Failed');</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body{
            background-image: url("signup-bg.jpg");
        }
    </style>
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Driver Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input"  id="username" name="username" placeholder="username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input"  id="password" name="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" id="submit" class="form-submit" value="Login in"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>