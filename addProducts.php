<?php
require 'config.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    if($_FILES["image"]["error"] === 4){
        echo "<script>alert('Please select an image');</script>";
    }
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo "<script> alert('Invalid Image Extension');</script>";
        }
        else if($fileSize > 100000000){
            echo "<script> alert('Image size is too large');</script>";
        }
        else{

            move_uploaded_file($fileName, 'resources/images'. $fileName);

            $sql = "SELECT * FROM products WHERE name='$name'";
		    $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $query = "INSERT INTO products(name, price, description, image)  VALUES ('$name', '$price', '$description', '$fileName')";
                mysqli_query($conn, $query);
                echo 
                "<script> 
                    alert('Product Added Successfully');
                    document.location.href = 'adminPage.php';
                </script>";
            }
            else {
                echo "<script>alert('Woops! Product Already Exists.')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Cache-control" content="no-cache">
        <title>Add Products</title>
        <script src="https://kit.fontawesome.com/c1a7ebaff2.js" crossorigin="anonymous"></script>
        <link href="resources/css/login.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="loginContainer">
            <form action ="" method="POST" class="loginWithEmail" autocomplete="off" enctype="multipart/form-data">
                <p class="loginText" style="font-size: 2rem; font-weight: 800;">Add Product</p>
                <div class="allInputs">
                    <input type = "text" placeholder="Product Name" name="name" id="name" required>
                </div>
                <div class="allInputs">
                    <input type="number" placeholder="Price" name="price" id="price" required>
                </div>
                <div class="allInputs">
                    <input type="text" placeholder="Description" name="description" id="description" required>
                </div>
                <div>
                    <label for="image" style="font-size:1.3rem;">Select an image:</label>
                    <input type="file" style=" font-size:medium;padding-top:10px;" name="image" accept=".jpg, .jpeg, .png" required> <br><br>
                </div>
                <div class="allInputs">
                    <button type = "submit" name="submit" class="myButton"> Submit </button>
                </div>
                <p class="signupText">Want to Go Back to Admin Page ? <a href="adminPage.php">Click Here</a></p>
            </form>
        </div>
    </body>
</html>