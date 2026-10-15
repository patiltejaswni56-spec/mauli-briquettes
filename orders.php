<?php
include "db.php";

$product = $_POST['product'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$payment = $_POST['payment'];

$email = "test@gmail.com"; // नंतर $_SESSION['email'] वापर

$delivery_days = "Within 2 Days";

$sql = "INSERT INTO orders
(email, productname, quantity, total, payment, delivery_days)
VALUES
('$email', '$product', '$qty', '$total', '$payment', '$delivery_days')";

mysqli_query($conn, $sql);

echo "<h2>✅ Order Successful 🎉</h2>";
echo "<p><strong>Order Status:</strong> Processing</p>";
echo "<p><strong>Estimated Delivery:</strong> $delivery_days</p>";
echo "<a href='products.php'>Back to Products</a>";
?>