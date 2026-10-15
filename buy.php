<?php
include "db.php";
session_start();

$product = $_GET['product'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Buy Product</title>

<link rel="stylesheet" href="style.css">

<style>

.buy-box{
background:white;
width:500px;
padding:30px;
margin:50px auto;
border-radius:15px;
box-shadow:0 0 20px black;
text-align:center;
color:black;
}

.buy-box h2{
color:green;
margin-bottom:20px;
}

.buy-box h3{
color:#14532d;
}

.buy-box input{
width:90%;
padding:12px;
font-size:16px;
border:1px solid #ccc;
border-radius:8px;
}

.buy-box button{
width:100%;
margin-top:15px;
font-size:18px;
}

</style>

</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<div class="navbar">
<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="products.php">Products</a>
<a href="cart.php">Cart</a>
<a href="register.php">Registration</a>
<a href="loginpage.php">Login</a>
<a href="contact.php">Contact</a>
<div class="menu-icon" onclick="openMenu()">☰</div>
</div>
</div>

<div class="buy-box">

<h2>🛒 Product Purchase</h2>

<h3>
<?php echo $product; ?>
</h3>

<p>
Selected Product:
<b><?php echo $product; ?></b>
</p>

<p>
Enter quantity in tons to continue purchase.
</p>

<form action="payment.php" method="POST">

<input type="hidden" name="product" value="<?php echo $product; ?>">

<label><b>Quantity (Ton)</b></label>
<br><br>

<input type="number" name="quantity" min="1" required>

<br><br>

<button type="submit">Proceed To Payment</button>

</form>

</div>

<div class="footer">
© 2026 Mauli Briquettes | All Rights Reserved
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