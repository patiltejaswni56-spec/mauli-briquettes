<?php
include "db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Products - Mauli Briquettes</title>

<style>

body{
    font-family:Arial;
    margin:0;
    background:#f4f4f4;
}

.header{
    background:green;
    color:white;
    text-align:center;
    padding:20px;
    font-size:30px;
}

.navbar{
    background:#14532d;
    padding:15px;
    text-align:center;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin:10px;
    font-weight:bold;
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
<a href="index.php">Home</a>
<a href="products.php">Products</a>
<a href="cart.php">Cart</a>
<a href="register.php">Register</a>
<a href="login.php">Login</a>
<div class="menu-icon" onclick="openMenu()">☰</div>
</div>
</div>

<div class="container">

<!-- Product 1 -->
<div class="card">
    <img src="images/1.png">

    <h3>Biomass Briquettes</h3>

    <p><b>₹7500 / Ton</b></p>

    <form action="buy.php" method="GET">
        <input type="hidden" name="product" value="Biomass Briquettes">
        <button type="submit">Buy Now</button>
    </form>

    <form action="addtocart.php" method="POST">
        <input type="hidden" name="productname" value="Biomass Briquettes">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="total" value="7500">
        <button type="submit">Add To Cart</button>
    </form>
</div>

<!-- Product 2 -->
<div class="card">
    <img src="images/2.png">

    <h3>Sawdust Briquettes</h3>

    <p><b>₹8000 / Ton</b></p>

    <form action="buy.php" method="GET">
        <input type="hidden" name="product" value="Sawdust Briquettes">
        <button type="submit">Buy Now</button>
    </form>

    <form action="addtocart.php" method="POST">
        <input type="hidden" name="productname" value="Sawdust Briquettes">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="total" value="8000">
        <button type="submit">Add To Cart</button>
    </form>
</div>

<!-- Product 3 -->
<div class="card">
    <img src="images/3.png">

    <h3>Agro Waste Briquettes</h3>

    <p><b>₹7000 / Ton</b></p>

    <form action="buy.php" method="GET">
        <input type="hidden" name="product" value="Agro Waste Briquettes">
        <button type="submit">Buy Now</button>
    </form>

    <form action="addtocart.php" method="POST">
        <input type="hidden" name="productname" value="Agro Waste Briquettes">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="total" value="7000">
        <button type="submit">Add To Cart</button>
    </form>
</div>

</div>
<div class="footer">
© 2026 Mauli Briquettes Management System | All Rights Reserved
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