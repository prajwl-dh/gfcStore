<?php 
session_start();

$_SESSION['searchText'] = $searchValue;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link href="resources/css/home.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!--Creating navbar inside header tag-->
        <div class="wrapper">
            <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
            <div class="logo"><a href="home.php">GFC STORE</a></div>
                <ul class="links">
                <li><a id="homeLink" href="home.php">Home</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li>
                    <a href="#" class="desktop-link"><?php echo $_SESSION['username']; ?></a>
                    <input type="checkbox" id="show-features">
                    <label for="show-features"><?php echo $_SESSION['username']; ?></label>
                    <ul>
                    <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
            <form method = "get" action="search.php" class="search-box" autocomplete="off" enctype="multipart/form-data">
                <input type="text" name = "searchText" placeholder="Type Something to Search..." required>
                <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
            </form>
            </nav>
        </div>

        <!--Creating main content-->
        <br><br><br><br><br>
        <div id="mainContent">
            <h1 id="welcome">Welcome to GFC Store!</h1>
            <p id="info">"Here, you can buy merchandise related to soccer including boots, jerseys, balls, shocks, gloves, and many more."</p>
            <ul>
                <li><a class="startShopping" href="store.php">Start Shopping..</a></li>
            </ul>
        </div>
        <br><br><br><br>

        <!--Creating footer-->
        <footer>
            <div class="copyrightIcon">
                <i class="fa-regular fa-copyright">
                    2022 GFC Web Store. All Rights Reserved
                </i>
            </div>

            <div>
                <img class="payIcon" src="resources/images/applepay.png">
                <img class="payIcon" src="resources/images/discover.png">
                <img class="payIcon" src="resources/images/mastercard.png">
                <img class="payIcon" src="resources/images/amex.png">
                <img class="payIcon" src="resources/images/gpay.png">
                <img class="payIcon" src="resources/images/visa.png">
            </div>
        </footer>
    </body>
</html>