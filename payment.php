<?php
include "db.php";
session_start();

$product         = $_POST['product'] ?? '';
$image           = $_POST['image'] ?? '';
$price           = $_POST['price'] ?? 7500;
$quantity        = $_POST['quantity'] ?? 1;
$total           = $_POST['total'] ?? ($price * $quantity);

$customer        = $_POST['customer_name'] ?? '';
$mobile          = $_POST['mobile'] ?? '';
$address         = $_POST['address'] ?? '';
$payment         = $_POST['payment'] ?? 'Online Payment';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Payment | Mauli Briquettes</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f2f2f2;
}

.payment-container{
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.payment-box{
    background:#fff;
    width:500px;
    border-radius:15px;
    padding:30px;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
    text-align:center;
}

.payment-box h2{
    color:green;
    margin-bottom:20px;
}

.payment-box p{
    font-size:17px;
    margin:10px 0;
}

.amount{
    font-size:28px;
    color:red;
    font-weight:bold;
}

.payment-box img{
    width:220px;
    border:2px solid #ddd;
    border-radius:10px;
    margin:15px 0;
}

.payment-box input{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
    box-sizing:border-box;
}

.payment-box button{
    width:100%;
    padding:14px;
    margin-top:20px;
    background:green;
    color:white;
    border:none;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
}

.payment-box button:hover{
    background:darkgreen;
}

.note{
    color:#555;
    font-size:14px;
}

.success{
    color:green;
    font-weight:bold;
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
<a href="contact.php">Contact</a>
</div>

<div class="payment-container">

<div class="payment-box">

<h2>💳 Secure Online Payment</h2>

<p><b>Product :</b> <?php echo htmlspecialchars($product); ?></p>

<p><b>Quantity :</b> <?php echo $quantity; ?> Ton</p>

<p class="amount">
₹<?php echo number_format($total); ?>
</p>

<hr>

<h3>Scan QR Code</h3>

<img src="images/qr.png" alt="QR Code">

<p><b>UPI ID :</b> maulibriquettes@upi</p>


<form action="ordersuccess.php" method="POST">

<input type="hidden" name="product" value="<?php echo htmlspecialchars($product); ?>">
<input type="hidden" name="image" value="<?php echo htmlspecialchars($image); ?>">
<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
<input type="hidden" name="total" value="<?php echo $total; ?>">
<input type="hidden" name="payment" value="Online Payment">

<input type="hidden" name="customer_name" value="<?php echo htmlspecialchars($customer); ?>">
<input type="hidden" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
<input type="hidden" name="address" value="<?php echo htmlspecialchars($address); ?>">

<input
type="text"
name="transaction_id"
placeholder="Enter UPI Transaction ID"
required>

<br><br>

<button type="submit">
     I Have Paid
</button>

</form>



</div>

</div>

<div class="footer">
© 2026 Mauli Briquettes | All Rights Reserved
</div>

</body>
</html>