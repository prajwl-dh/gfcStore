<?php 
require 'config.php';
session_start();
$searchValue = $_GET['searchText'];

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['plusButton']))
{
    $username = $_SESSION['username'];
    $productname = $_POST['productname'];
    $productimage = $_POST['productimage'];
    $price = $_POST['price'];
    $query = "INSERT INTO cart (username, productname, price, productimage)
    VALUES ('$username', '$productname', '$price', '$productimage')";
    mysqli_query($conn, $query);
}

else if(isset($_POST['minusButton']))
{
    $username = $_SESSION['username'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $query = "DELETE FROM cart WHERE productname = '$productname' AND price = '$price' ORDER BY id DESC LIMIT 1";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Search</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="resources/css/store.css" rel="stylesheet" type="text/css">
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
                <li><a href="home.php">Home</a></li>
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

        <!--Creating the products section-->
        <div class="productType">
            <p class="productName">Search Results For : <?=$searchValue?></p>
            <hr>
            <div class="shop" id="shop">
            <?php 
                $sql = "SELECT * FROM products WHERE name LIKE '%$searchValue%' OR description LIKE '%$searchValue%' ORDER BY id ASC";
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) { ?>
                    <form method = "POST" class="toCartForm" autocomplete="off" enctype="multipart/form-data">
                        <div class="item">
                        <img width="250" height="290" src="resources/images/<?=$row['image']?>" alt="boot1">
                        <div class="details">
                            <input type="" name="productimage" value="<?=$row['image']?>" hidden>
                            <input type="" name="productname" value="<?=$row['name']?>" hidden>
                            <h3><?=$row['name']?></h3>
                            <p><?=$row['description']?></p>
                            <div class="price-quantity">
                                <input type="" name="price" value="<?=$row['price']?>" hidden>
                                <h2>$ <?=$row['price']?></h2>
                                <div class="buttons">
                                    <button type="submit" name="minusButton" class="bi bi-dash-square" id="formsubmit"></button>
                                    <?php 
                                        $displayQuery = "SELECT * FROM cart WHERE productname = '".$row['name']."' AND price = '".$row['price']."'";
                                        if ($result = mysqli_query($conn, $displayQuery)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                         }
                                    ?>
                                    <div class="quantiy"><?=$rowcount?></div>
                                    <button type="submit" name="plusButton" class="bi bi-plus-square" id="formsubmit"></button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
            <?php } }?>
        </div>
        </div>

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
        <script>
            document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        </script>
    </body>
</html>