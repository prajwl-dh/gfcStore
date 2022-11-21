<?php 
require 'config.php';
session_start();
$_SESSION['searchText'] = $searchValue;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['checkoutButton']))
{
    $query = "SELECT * FROM cart WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) 
    {
        header("Location: checkout.php");
    }
    else
    {
        echo "<script>alert('Your cart is empty. Please add items to cart first!')</script>";
    }
}

if(isset($_POST['removeAllButton']))
{
    $query = "DELETE FROM cart WHERE username = '".$_SESSION['username']."'";
    mysqli_query($conn, $query);
}

if(isset($_POST['removeOne']))
{
    $productname = $_POST['productname'];
    $query = "DELETE FROM cart WHERE productname = '$productname'";
    mysqli_query($conn, $query);
}

if(isset($_POST['plusButton']))
{
    $username = $_SESSION['username'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $productimage = $_POST['productimage'];
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
        <title>Cart</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="resources/css/cart.css" rel="stylesheet" type="text/css">
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
                <li><a id="cartLink" href="cart.php">Cart</a></li>
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

        <!--Creating cart content-->
        <div class = "cartContainer">
            <div class="header">
                <h3 class="heading">Shopping Cart</h3>
                <form onSubmit="if(!confirm('Do you really want to remove all products from the cart ?')){return false;}" method = "POST" class="removeAll">
                    <h5 class="removeAll"><button type = "submit" name = "removeAllButton" class="removeButton">Remove All</button></h5>
                </form>
            </div><br><br><br><hr>
            <?php 
                $sql = "SELECT DISTINCT productname, price, productimage FROM cart WHERE username = '".$_SESSION['username']."'";
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) { ?>
                    <form method = "POST" class="toCartForm" autocomplete="off" enctype="multipart/form-data">
                    <div class="cartItems">
                            <div class="imagebox">
                                <img height = "120px" src="resources/images/<?=$row['productimage']?>" alt="image"/>
                            </div>
                            <div class="about">
                                <input type="" name="productimage" value="<?=$row['productimage']?>" hidden>
                                <input type="" name="productname" value="<?=$row['productname']?>" hidden>
                                <input type="" name="price" value="<?=$row['price']?>" hidden>
                            
                                <h1 class="title">Name: <?=$row['productname']?></h1>
                                <h3 class="subtitle">Unit Price: $ <?=$row['price']?></h3>
                                <h3 class="subtitle">Quantity:</h3>
                                <div class="buttons">
                                        <button type="submit" name="minusButton" class="bi bi-dash-square" id="formsubmit"></button>
                                        <?php 
                                            $displayQuery = "SELECT * FROM cart WHERE productname = '".$row['productname']."' AND price = '".$row['price']."'";
                                            if ($result = mysqli_query($conn, $displayQuery)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                            }
                                        ?>
                                        <div class="quantity"><?=$rowcount?></div>
                                        <button type="submit" name="plusButton" class="bi bi-plus-square" id="formsubmit"></button>
                                    </div>
                            </div>
                            <div class="prices">
                                <?php 
                                    $Unittotal = $row['price'] * $rowcount;
                                ?>
                                <div class="amount">$<?=$Unittotal?></div>
                                <form onSubmit="if(!confirm('Do you really want to remove all products from the cart ?')){return false;}" method = "POST" class="removeOne">
                                <div class="remove"><button type="submit" name="removeOne" class="removeOne"><u>Remove</u></button></div>
                                </form>
                            </div>
                    </div>
                    </form>
                    <hr> 
            <?php } }?>

            <!-- Creating Checkout button -->
            <hr> 
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Total: </div>
                    </div>
                    <?php 
                        $sql = "SELECT DISTINCT productname, price, productimage FROM cart WHERE username = '".$_SESSION['username']."'";
                        $res = mysqli_query($conn, $sql);
                        $total = 0;
                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { 
                                $displayQuery = "SELECT * FROM cart WHERE productname = '".$row['productname']."' AND price = '".$row['price']."'";
                                if ($result = mysqli_query($conn, $displayQuery)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows( $result );
                                }
                                $Unittotal = $row['price'] * $rowcount;
                                $total = $total + $Unittotal;
                            }
                        }
                    ?>
                    <div class="total-amount">$<?=$total?></div>
                </div>
                <form method = "POST"  autocomplete="off" enctype="multipart/form-data">
                <button type = "submit" name = "checkoutButton" class="checkoutButton">Checkout</button>
                </form>
            </div>
        </div>

        <!--Creating footer content-->
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