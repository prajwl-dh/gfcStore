<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admins WHERE email='$email' OR username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admins (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Admin Sign Up Completed Successfully.');
                document.location.href = 'adminLogin.php';</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email/Username Already Exists. Please try different credentials')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Admin Sign Up</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link href="resources/css/login.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="loginContainer">
            <form action ="" method="POST" class="loginWithEmail">
                <p class="loginText" style="font-size: 2rem; font-weight: 800;">Admin Registration</p>
                <div class="allInputs">
                    <input type = "text" placeholder="Username" name="username" required>
                </div>
                <div class="allInputs">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="allInputs">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="allInputs">
                    <input type="password" placeholder="Confirm Password" name="cpassword" required>
                </div>
                <div class="allInputs">
                    <button name="submit" class="myButton"> Sign Up </button>
                </div>
                <p class="signupText">Have an admin account ? <a href="adminLogin.php">Click Here</a></p>
            </form>
        </div>
    </body>
</html>