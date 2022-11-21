<?php 
require 'config.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "DELETE FROM products WHERE name = '$name' AND price = '$price'";
    mysqli_query($conn, $query);
    echo "<script>
            alert('Product Removed Successfully');
            document.location.href = 'removeProducts.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Remove Products</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="resources/css/removeProducts.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar">
                <div class="elements">
                    <h2><br>To Remove Product :</h2><br>
                    <p>"Click remove button on any product to remove that product from the store"</p>
                    <br><br><br><br><br>
                    <p>OR</p><br>
                    <a href="adminPage.php">Click Here to Go back to Admin page</a>
                    <br>
                </div>
            </div>
        </div>
            <!--Creating the boots section-->
            <div class="productType">
                <p class="productName">Boots</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Boots%' OR name LIKE '%boots%' OR name LIKE '%boot%' OR name LIKE '%Boot%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the boots section-->

            <!--Creating the jersey section-->
            <div class="productType">
                <p class="productName">Jersey</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Jerseys%' OR name LIKE '%jerseys%' OR name LIKE '%Jersey%' OR name LIKE '%jersey%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the jersey section-->

            <!--Creating the ball section-->
            <div class="productType">
                <p class="productName">Ball</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Balls%' OR name LIKE '%balls%' OR name LIKE '%Ball%' OR name LIKE '%ball%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the ball section-->

            <!--Creating the gloves section-->
            <div class="productType">
                <p class="productName">Gloves</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Gloves%' OR name LIKE '%gloves%' OR name LIKE '%Glove%' OR name LIKE '%glove%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the gloves section-->

            <!--Creating the socks section-->
            <div class="productType">
                <p class="productName">Socks</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Socks%' OR name LIKE '%socks%' OR name LIKE '%Sock%' OR name LIKE '%sock%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the socks section-->

            <!--Creating the bottle section-->
            <div class="productType">
                <p class="productName">Water Bottle</p>
                <hr>
                <div class="shop" id="shop">
                    <?php 
                        $sql = "SELECT * FROM products WHERE name LIKE '%Bottles%' OR name LIKE '%bottles%' OR name LIKE '%Bottle%' OR name LIKE '%bottle%' ORDER BY id ASC";
                        $res = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) { ?>
                                <form onSubmit="if(!confirm('Do you really want to remove <?=$row['name']?> ?')){return false;}" method = "POST" class="removeForm" autocomplete="off" enctype="multipart/form-data">
                                <div class="item">
                                    <img width="190" height="270" src="resources/images/<?=$row['image']?>" alt="boot1">
                                    <div class="details">
                                        <input type="" name="name" value="<?=$row['name']?>" hidden>
                                        <h4><?=$row['name']?></h4>
                                        <div class="price-quantity">
                                            <input type="" name="price" value="<?=$row['price']?>" hidden>
                                            <h2>$ <?=$row['price']?></h2>
                                        </div>
                                    </div>
                                        <button type = "submit" name = "submit" class="allInput">Remove</button><br>
                                    </form>
                </div>
                    <?php } }?>
            </div>
            <br>
            <!--Creating the bottle section-->
    </body>
</html>