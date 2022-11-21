<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: adminPage.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: adminPage.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Admin Login Page</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link href="resources/css/login.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="loginContainer">
            <form action ="" method = "POST" class="loginWithEmail">
                <p class="loginText" style="font-size: 2rem; font-weight: 800;">Admin Login</p>
                <div class="allInputs">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="allInputs">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>">
                </div>
                <div class="allInputs">
                    <button name="submit" class="myButton"> Login </button>
                </div>
                <p class="signupText">Want to login as user? <a href="login.php">Click here</a></p>
            </form>
        </div>
    </body>
</html>