<?php
include "db.php";
session_start();

if(isset($_GET['quality']) && $_GET['quality']!="")
{
    $quality = mysqli_real_escape_string($conn,$_GET['quality']);

    $result = mysqli_query($conn,
    "SELECT * FROM products WHERE quality='$quality'");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM products");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Products - Mauli Briquettes</title>
<link rel="stylesheet" href="style.css?v=1">

<style>

body{
    font-family:Arial;
    margin:0;
    background:#f4f4f4;
}
.container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
    padding:20px;
}

.card{
    background:white;
    width:280px;
    padding:15px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    text-align:center;
}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:10px;
}

button{
    width:100%;
    padding:10px;
    margin-top:10px;
    border:none;
    color:white;
    background:green;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:darkgreen;
}



</style>

</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES PRODUCTS
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
<a href="adminlogout.php">Logout</a>

</div>

<div id="overlay" class="overlay" onclick="closeMenu()"></div>
<div style="text-align:center;padding:20px;">

<form method="GET">

<select name="quality" style="padding:10px;width:220px;">

<option value="" <?php if(!isset($_GET['quality']) || $_GET['quality']=="") echo "selected"; ?>>
All Quality
</option>

<option value="Best" <?php if(isset($_GET['quality']) && $_GET['quality']=="Best") echo "selected"; ?>>
Best
</option>

<option value="Medium" <?php if(isset($_GET['quality']) && $_GET['quality']=="Medium") echo "selected"; ?>>
Medium
</option>

<option value="Low" <?php if(isset($_GET['quality']) && $_GET['quality']=="Low") echo "selected"; ?>>
Low
</option>

</select>

<button style="width:120px;margin-left:10px;">
Search
</button>

</form>

</div>

<div class="container">


<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<img src="images/<?php echo $row['image']; ?>">

<h3><?php echo $row['productname']; ?></h3>

<p><b>₹<?php echo $row['rate']; ?> / Ton</b></p>

<p><?php echo $row['pdesc']; ?></p>
<p>
<b>Quality :</b>
<?php echo $row['quality']; ?>
</p>
<p>
<b>Available Stock :</b>
<?php echo $row['stock']; ?> Tons
</p>

<?php
if($row['stock'] <= 10 && $row['stock'] > 0)
{
?>
<p style="color:red;font-weight:bold;">
Hurry! Only <?php echo $row['stock']; ?> Tons Left.
</p>
<?php
}
?>

<form action="order.php" method="GET">

<input type="hidden" name="product"
value="<?php echo $row['productname']; ?>">

<input type="hidden" name="price"
value="<?php echo $row['rate']; ?>">

<input type="hidden" name="image"
value="images/<?php echo $row['image']; ?>">

<input type="hidden" name="quality"
value="<?php echo $row['quality']; ?>">

<input type="hidden" name="stock"
value="<?php echo $row['stock']; ?>">

<?php
if($row['stock'] > 0)
{
?>
    <button type="submit">Buy Now</button>
<?php
}
else
{
?>
    <h3 style="color:red;">Out Of Stock</h3>
<?php
}
?>

</form>

<form action="addtocart.php" method="POST">

<input type="hidden" name="productname"
value="<?php echo $row['productname']; ?>">

<input type="hidden" name="price"
value="<?php echo $row['rate']; ?>">

<input type="hidden" name="image"
value="images/<?php echo $row['image']; ?>">

<input type="hidden" name="quantity" value="1">

<input type="hidden" name="total"
value="<?php echo $row['rate']; ?>">

<input type="hidden" name="quality"
value="<?php echo $row['quality']; ?>">

<?php
if($row['stock'] > 0)
{
?>
    <button type="submit">Add To Cart</button>
<?php
}
?>

</form>

</div>

<?php
}
?>
</div>
<!-- Footer Start -->
<div class="footer">

    <div class="footer-container">

        <div class="footer-section">
            <h2>MAULI BRIQUETTES MANAGEMENT SYSTEM</h2>
            <p>Eco-Friendly Biomass Fuel Solutions</p>
            <p>Turning Agricultural Waste into Clean Energy.</p>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="index.php">Home</a><br>
            <a href="about.php">About</a><br>
            <a href="products.php">Products</a><br>
            <a href="contact.php">Contact Us</a><br>
            <a href="myorders.php">My Orders</a>
        </div>

        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Phone : +91 XXXXX XXXXX</p>
            <p>Email : maulibriquettes@gmail.com</p>
            <p>Customer Support : 9 AM - 6 PM</p>
        </div>

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
    document.getElementById("sidebar").style.left="-260px";
    document.getElementById("overlay").style.display="none";
}
</script>
</body>
</html>