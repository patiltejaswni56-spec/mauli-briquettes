<?php
include "db.php";
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$product = $_GET['product'];
$price = $_GET['price'];
$image = $_GET['image'];

if(isset($_POST['placeorder']))
{
    $customer = $_POST['customer_name'];
    $mobile   = $_POST['mobile'];
    $address  = $_POST['address'];
    $quantity = $_POST['quantity'];
    $payment  = $_POST['payment'];

    $total = $price * $quantity;
    $getstock = mysqli_query($conn,
"SELECT stock FROM products WHERE productname='$product'");

$row = mysqli_fetch_assoc($getstock);

$available_stock = $row['stock'];

if($quantity > $available_stock)
{
    echo "<script>
    alert('Only ".$available_stock." Tons are available in stock.');
    window.history.back();
    </script>";
    exit();
}

    if($payment == "Online Payment")
    {
        ?>

        <form id="paymentForm" action="payment.php" method="POST">

            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="product" value="<?php echo $product; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <input type="hidden" name="image" value="<?php echo $image; ?>">
            <input type="hidden" name="customer_name" value="<?php echo $customer; ?>">
            <input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="hidden" name="payment" value="<?php echo $payment; ?>">

        </form>

        <script>
            document.getElementById("paymentForm").submit();
        </script>

        <?php
        exit();
    }

    $new_stock = $available_stock - $quantity;

mysqli_query($conn,
"UPDATE products
SET stock='$new_stock'
WHERE productname='$product'");

    mysqli_query($conn,"INSERT INTO orders
    (email,productname,image,quantity,total,payment,customer_name,mobile,address)
    VALUES
    ('$email','$product','$image','$quantity','$total','$payment','$customer','$mobile','$address')");

    echo "<script>
    alert('Order Placed Successfully!');
    window.location='products.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Form</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}

.box{
    width:500px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

.box h2{
    text-align:center;
    color:green;
}

.box input,
.box textarea,
.box select{
    width:100%;
    padding:10px;
    margin-top:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

.box button{
    width:100%;
    padding:12px;
    margin-top:15px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

.box button:hover{
    background:darkgreen;
}
</style>

</head>

<body>

<div class="box">

<h2>Product Order Form</h2>

<form method="post">

<label>Product Name</label>
<input type="text" value="<?php echo $product; ?>" readonly>

<label>Price (Per Ton)</label>
<input type="text" value="₹<?php echo $price; ?>" readonly>

<input type="text" name="customer_name" placeholder="Full Name" required>

<input type="text" name="mobile" placeholder="Mobile Number" required>


<textarea name="address" placeholder="Delivery Address" required></textarea>

<input type="number" name="quantity" placeholder="Quantity (Ton)" required>

<select name="payment" required>
<option value="">Select Payment Method</option>
<option>Cash On Delivery</option>
<option>Online Payment</option>
</select>

<button type="submit" name="placeorder">
Place Order
</button>

</form>

</div>

</body>
</html>