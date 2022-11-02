<?php
session_start();
error_reporting(0);
$db = mysqli_connect('localhost', 'root', '', 'carrentalp') or die("Connection Failed");
	if(isset($_POST['login'])){
		$uname = $_POST['customer_username'];
		$pass = $_POST['customer_password'];		
		$query = "SELECT customer_username, customer_password FROM customers WHERE customer_username='$uname' AND customer_password='$pass' LIMIT 1";
        $result = mysqli_query($db, $query);
	    $count = mysqli_num_rows($result);
        $_SESSION['username']=$uname;

	  if ($count == 1) {
        header('Location:customerlogin.php');
    }
    else{
        echo "<script> alert('Invalid username/password');</script>";
    }
}
        if(isset($_POST['register'])){
            $conn = mysqli_connect('localhost', 'root', '', 'carrentalp') or die("Connection Failed");
            $customer_name =$_POST['customer_name'];
            $customer_username =$_POST['customer_username'];
            $customer_email = $_POST['customer_email'];
            $customer_phone =$_POST['customer_phone'];
            $customer_address = $_POST['customer_address'];
            $customer_password =$_POST['customer_password'];
            $usernamequery="select * from customers where customer_username='$customer_username'";
            $query=mysqli_query($conn,$usernamequery);
            $count=mysqli_num_rows($query);
            if($count > 0)
            {
                echo "<script>alert('user already exists')</script>";
            }else { 
            $query = "INSERT into customers(customer_name,customer_username,customer_email,customer_phone,customer_address,customer_password) VALUES('" . $customer_name . "','" . $customer_username . "','" . $customer_email . "','" . $customer_phone . "','" . $customer_address ."','" . $customer_password ."')";
            $success = $conn->query($query);  
            
            echo "<script>alert('registered')</script>";

            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>Already Have An Account ?</h2>
                <button class="signinBtn">Sign in</button>
            </div>
            <div class="box signup">
                <h2>Don't Have An Account ?</h2>
                <button class="signupBtn">Sign up</button>
            </div>
        </div>
        <div class="formBx">
           <div class="form signinForm">
               <form method="post">
                   <h3>Sign in</h3>
                   <input type="text" placeholder="username" name="customer_username" required>
                   <input type="password" placeholder="password" name="customer_password" required>
                   <input type="submit" value="Login" name="login">
                   <a href="#" class="forgot">Forgot Password</a>
               </form>
           </div>
           <div class="form signupForm">
            <form method="post">
                <h3>Sign in</h3>
                <input type="text" placeholder="name" name="customer_name" required>
                <input type="text" placeholder="username" name="customer_username" required>
                <input type="text" placeholder="Email Address" name="customer_email" required>
                <input type="text" placeholder="Phone number" name="customer_phone" required>
                <input type="text" placeholder="Address" name="customer_address" required>
                <input type="password" placeholder="password" name="customer_password" required>
                <input type="submit" value="Register" name="register">
            </form>
        </div>
        </div>
    </div>
    <script>
        const signinBtn=document.querySelector('.signinBtn');
        const signupBtn=document.querySelector('.signupBtn');
        const formBx = document.querySelector('.formBx');
        const  body = document.querySelector('body');
        signupBtn.onclick=function() {
            formBx.classList.add('active')
            body.classList.add('active')
        }
        signinBtn.onclick=function() {
            formBx.classList.remove('active')
            body.classList.remove('active')
        }
    </script>
</body>
</html>