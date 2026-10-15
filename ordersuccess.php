<?php
include "db.php";
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$product         = $_POST['product'] ?? '';
$image           = $_POST['image'] ?? '';
$quantity        = $_POST['quantity'] ?? '';
$total           = $_POST['total'] ?? '';
$payment         = $_POST['payment'] ?? '';
$customer        = $_POST['customer_name'] ?? '';
$mobile          = $_POST['mobile'] ?? '';
$address         = $_POST['address'] ?? '';
$transaction_id  = $_POST['transaction_id'] ?? '';

if($product == '' || $quantity == '' || $total == '')
{
    die("Invalid Order Request!");
}
$getstock = mysqli_query($conn,
"SELECT stock FROM products
WHERE productname='$product'");

$row = mysqli_fetch_assoc($getstock);

$current_stock = $row['stock'];

if($quantity > $current_stock)
{
    die("Only ".$current_stock." Tons are available in stock.");
}

$new_stock = $current_stock - $quantity;

mysqli_query($conn,
"UPDATE products
SET stock='$new_stock'
WHERE productname='$product'");

$insert = mysqli_query($conn,"
INSERT INTO orders
(email, productname, image, quantity, total, payment, transaction_id, customer_name, mobile, address, status)
VALUES
('$email','$product','$image','$quantity','$total','$payment','$transaction_id','$customer','$mobile','$address','Pending')
");

if(!$insert)
{
    die("Database Error : ".mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order Successful</title>

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f4f4f4;
}

.container{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    width:500px;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,0,0,.2);
    text-align:center;
}

h1{
    color:green;
}

p{
    font-size:18px;
    margin:10px 0;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:green;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:17px;
}

.btn:hover{
    background:darkgreen;
}

</style>

</head>

<body>

<div class="container">

<div class="box">

<h1>✅ Order Received Successfully</h1>

<p><b>Product :</b> <?php echo htmlspecialchars($product); ?></p>

<p><b>Quantity :</b> <?php echo htmlspecialchars($quantity); ?> Ton</p>

<p><b>Total Amount :</b> ₹<?php echo htmlspecialchars($total); ?></p>

<p><b>Payment Method :</b> <?php echo htmlspecialchars($payment); ?></p>

<?php
if($payment == "Online Payment")
{
?>
<p><b>Transaction ID :</b> <?php echo htmlspecialchars($transaction_id); ?></p>
<?php
}
?>

<p style="color:green;">
Your order has been received successfully.
</p>

<p>
<b>Current Status :</b>
<span style="color:orange;font-weight:bold;">
🟡 Pending
</span>
</p>

<p>
Our team will verify your order and update the status soon.
Please check <b>My Orders</b> to track your order.
</p>

<a href="products.php" class="btn">
Continue Shopping
</a>

</div>

</div>

</body>
</html>