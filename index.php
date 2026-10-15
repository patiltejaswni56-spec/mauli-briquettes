<?php
session_start();

/*
if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}
*/
?>

<!DOCTYPE html>
<html>
<head>
<title>Mauli Briquettes</title>
<link rel="stylesheet" href="style.css?v=1">
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
    <a href="updateproduct.php">Update Product</a>
    <a href="deleteproduct.php">Delete Product</a>
    <a href="productreport.php">Product Report</a>
    <a href="vieworders.php">View Orders</a>
    <a href="logout.php">Logout</a>
    <a href="adminlogout.php">🚪 Logout</a>
</div>

<div id="overlay" class="overlay" onclick="closeMenu()"></div>

<div class="buy-container">

<div class="buy-box">

<h1 style="color:green;">
Welcome to Mauli Briquettes
</h1>

<hr>

<p>
Mauli Briquettes is a trusted supplier of eco-friendly biomass fuel
manufactured from agricultural and forestry waste materials.
</p>

<p>
Our briquettes provide a clean, renewable and cost-effective
alternative to coal, firewood and traditional fuels.
</p>

<hr>

</div>

</div>

<!-- Footer Start -->
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
<!-- Footer End -->

<script>
function openMenu(){
document.getElementById("sidebar").style.left="0";
document.getElementById("overlay").style.display="block";
}

function closeMenu(){
document.getElementById("sidebar").style.left="-250px";
document.getElementById("overlay").style.display="none";
}
</script>

</body>
</html>