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
"SELECT * FROM cart WHERE email='$email'");
?>
<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
<link rel="stylesheet" href="style.css?v=1">
<style>
.card{
    background:white;
    width:350px;
    margin:20px auto;
    padding:15px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    text-align:center;
}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
}

button{
    background:red;
    color:white;
    border:none;
    padding:10px;
    cursor:pointer;
}
.menu-icon{
    color:white;
    font-size:28px;
    cursor:pointer;
    margin-right:20px;
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

<h2 align="center">My Cart</h2>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<img src="<?php echo $row['image']; ?>">

<h3><?php echo $row['productname']; ?></h3>

<p><b>Price :</b> ₹<?php echo $row['price']; ?></p>

<p><b>Quantity :</b> <?php echo $row['quantity']; ?></p>

<p>
<b>Total Payment :</b>
₹<?php echo $row['total']; ?>
</p>
<form action="order.php" method="GET">

    <input type="hidden" name="product"
    value="<?php echo $row['productname']; ?>">

    <input type="hidden" name="price"
    value="<?php echo $row['price']; ?>">

    <button type="submit"
    style="background:green; margin-bottom:10px;">
        Buy Now
    </button>

</form>
<a href="removecart.php?id=<?php echo $row['id']; ?>">
<button>Remove</button>
</a>

</div>

<?php } ?>

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
    document.getElementById("sidebar").style.left="-250px";
    document.getElementById("overlay").style.display="none";
}
</script>
    

</body>
</html>