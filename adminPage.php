<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:adminlogin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Admin Home Page</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link href="resources/css/adminPage.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="mainContainer">
            <form class="buttons">
                <p class="welcomeText" style="font-size: 2rem; font-weight: 800;">Welcome <p class="welcomeText" style="font-size: 2rem; font-weight: 800; color:red;"><?php echo $_SESSION['username']; ?></p></p>
                <br>
                <div class="allLinks">
                    <button class="myButton" formaction="addProducts.php"> <a href="addProducts.php">Add Products</a> </button>
                </div>
                <br>
                <div class="allLinks">
                    <button class="myButton" formaction="removeProducts.php"> <a href="removeProducts.php">Remove Products</a> </button>
                </div>
                <br>
                <div class="allLinks">
                    <button class="myButton" formaction="logout.php"> <a href="logout.php">LogOut</a> </button>
                </div>
            </form>
        </div>
    </body>
</html>