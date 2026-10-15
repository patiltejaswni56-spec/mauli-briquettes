<?php
include "db.php";
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$productname = $_POST['productname'];
$price = $_POST['price'];
$image = $_POST['image'];
$quantity = $_POST['quantity'];

$total = $price * $quantity;

mysqli_query($conn,
"INSERT INTO cart(productname,price,image,quantity,email,total)
VALUES('$productname','$price','$image','$quantity','$email','$total')");

header("Location: cart.php");
exit();
?>