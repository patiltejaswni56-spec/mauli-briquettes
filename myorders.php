<?php
include "db.php";
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$result = mysqli_query($conn,
"SELECT * FROM orders WHERE email='$email' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders</title>

<link rel="stylesheet" href="style.css?v=1">

<style>

.container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
    padding:20px;
}

.card{
    background:white;
    width:320px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    overflow:hidden;
}

.card img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.details{
    padding:15px;
}

.details h3{
    color:green;
    margin-top:0;
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
<a href="updateproduct.php">Update Product</a>
<a href="deleteproduct.php">Delete Product</a>
<a href="productreport.php">Product Report</a>
<a href="vieworders.php">View Orders</a>
<a href="adminlogout.php">Logout</a>

</div>

<div id="overlay" class="overlay" onclick="closeMenu()"></div>

<div class="container">

<?php
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>
<div class="card">

<img src="<?php echo $row['image']; ?>">

<div class="details">

<h3><?php echo $row['productname']; ?></h3>

<p><b>Customer :</b> <?php echo $row['customer_name']; ?></p>

<p><b>Quantity :</b> <?php echo $row['quantity']; ?> Ton</p>

<p><b>Total :</b> ₹<?php echo $row['total']; ?></p>

<p><b>Payment :</b> <?php echo $row['payment']; ?></p>

<p><b>Mobile :</b> <?php echo $row['mobile']; ?></p>

<p><b>Order Status :</b>

<?php

if($row['status']=="Pending")
{
    echo "<span style='color:orange;font-weight:bold;'>🟡 Pending</span>";
}

elseif($row['status']=="Confirmed")
{
    echo "<span style='color:blue;font-weight:bold;'>🔵 Confirmed</span>";
}

elseif($row['status']=="Shipped")
{
    echo "<span style='color:purple;font-weight:bold;'>🚚 Shipped</span>";
}

elseif($row['status']=="Delivered")
{
    echo "<span style='color:green;font-weight:bold;'>✅ Delivered</span>";
}

?>

</p>
<p><b>Estimated Delivery :</b>
<?php echo $row['delivery_days']; ?>
</p>
<?php

if($row['status']=="Pending")
{
    echo "<p style='color:orange;'>
    Your order has been received and is waiting for confirmation.
    </p>";
}

elseif($row['status']=="Confirmed")
{
    echo "<p style='color:blue;'>
    Your order has been confirmed by our team.
    </p>";
}

elseif($row['status']=="Shipped")
{
    echo "<p style='color:purple;'>
    🚚 Your order is on the way.
    </p>";
}

elseif($row['status']=="Delivered")
{
    echo "<p style='color:green;font-weight:bold;'>
    🎉 Your order has been delivered successfully.
    Thank you for shopping with us.
    </p>";
}

?>

</div>

</div>

<?php
    }
}
else
{
    echo "<h2>No Orders Found</h2>";
}
?>

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