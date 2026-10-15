<?php
session_start();
include "db.php";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['email']=$email;

        header("Location: index.php");
    }
    else
    {
        echo "Invalid Email or Password";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login - Mauli Briquettes</title>

<link rel="stylesheet" href="style.css">

<style>

.form-box{
background:white;
width:400px;
padding:30px;
margin:50px auto;
border-radius:10px;
box-shadow:0 0 10px #ccc;
text-align:center;
color:black;
}

.form-box input{
width:95%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

.form-box button{
width:100%;
padding:10px;
background:green;
color:white;
border:none;
cursor:pointer;
border-radius:5px;
}

.error{
color:red;
font-weight:bold;
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<div class="navbar">

<span class="menu-icon" onclick="window.location='adminlogin.php'">☰</span>

<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="products.php">Products</a>
<a href="contact.php">Contact</a>

<?php
if(isset($_SESSION['email']))
{
?>
    <a href="cart.php">Cart</a>
    <a href="myorders.php">My Orders</a>
    <a href="logout.php">Logout</a>
<?php
}
else
{
?>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
<?php
}
?>

</div>
<div id="sidebar" class="sidebar">

<a href="adminlogin.php">Dashboard</a>
<a href="addproduct.php">Add Product</a>
<a href="viewproducts.php">View Products</a>
<a href="productreport.php">Product Report</a>
<a href="vieworders.php">View Orders</a>
<a href="adminlogout.php">Logout</a>

</div>

<div id="overlay" class="overlay"></div>

<div class="form-box">

<h2>Login</h2>

<?php
if(isset($msg))
{
    echo "<div class='error'>$msg</div>";
}
?>

<form method="POST"
autocomplete="off">

<input type="email" name="email" placeholder="Enter Email" autocomplete="off" required>

<input type="password" name="password" placeholder="Enter Password" autocomplete="off" required>

<button type="submit" name="login">Login</button>

</form>

</div>

<div class="footer">

    <div class="footer-container">

        <!-- Project Information -->
        <div class="footer-section">
            <h2>MAULI BRIQUETTES MANAGEMENT SYSTEM</h2>
            <p>Eco-Friendly Biomass Fuel Solutions</p>
            <p>Turning Agricultural Waste into Clean Energy.</p>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
            <h3>Quick Links</h3>

            <a href="index.php">Home</a><br>
            <a href="about.php">About</a><br>
            <a href="products.php">Products</a><br>
            <a href="contact.php">Contact Us</a><br>
            <a href="myorders.php">My Orders</a>
        </div>

        <!-- Contact Information -->
        <div class="footer-section">
            <h3>Contact Us</h3>

            <p>Phone : +91 XXXXX XXXXX</p>
            <p>Email : maulibriquettes@gmail.com</p>
            <p>Customer Support : 9 AM - 6 PM</p>
        </div>

        <!-- Features -->
        <div class="footer-section">
            <h3>Our Features</h3>

            <p>✔ Premium Quality Products</p>
            <p>✔ Secure Payment</p>
            <p>✔ Fast Delivery</p>
            <p>✔ Eco-Friendly Fuel</p>
        </div>

    </div>

    <hr>

</div>


</body>
</html>