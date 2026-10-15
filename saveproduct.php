<?php
include "db.php";

if(isset($_POST['productname']))
{
    $productname = $_POST['productname'];
    $rate = $_POST['rate'];
    $pdesc = $_POST['pdesc'];
    $quality = $_POST['quality'];
    $stock = $_POST['stock'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    // unique image name
    $newImageName = time() . "_" . $image;
    $uploadPath = "images/" . $newImageName;

    if(move_uploaded_file($temp, $uploadPath))
    {
        $sql = "INSERT INTO products (productname, rate, pdesc, quality, stock, image)
        VALUES ('$productname', '$rate', '$pdesc', '$quality', '$stock', '$newImageName')";
        
        if(mysqli_query($conn, $sql))
        {
            // 🔥 IMPORTANT: prevents duplicate on refresh/back
            header("Location: viewproducts.php");
            exit();
        }
        else
        {
            echo "Database Error: " . mysqli_error($conn);
        }
    }
    else
    {
        echo "<script>
            alert('Image Upload Failed');
            window.location='addproduct.php';
        </script>";
    }
}
else
{
    header("Location: addproduct.php");
    exit();
}
?>