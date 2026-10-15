<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Register - Mauli Briquettes</title>

<link rel="stylesheet" href="style.css?v=1">

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

<div id="overlay" class="overlay" onclick="closeMenu()"></div>

<div class="form-box">

<h2>Register</h2>

<form action="save.php" method="POST"
autocomplete="off">

<input type="text" name="name"
placeholder="Enter Full Name" required>

<input type="email" name="email"
placeholder="Enter Email" required>

<input type="text" name="mobile"
placeholder="Enter Mobile Number" required>

<input type="password" name="password"
placeholder="Enter Password" required>

<button type="submit">Register</button>

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

</body>
</html>