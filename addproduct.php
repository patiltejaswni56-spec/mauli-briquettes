<?php
include "db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<?php include "sidebar.php"; ?>

<div class="admin-main">

<div class="buy-container">

<div class="buy-box">

<h2>Add Product</h2>

<form action="saveproduct.php" method="POST" enctype="multipart/form-data">

<input type="text" name="productname" placeholder="Product Name" required>
<br><br>

<input type="number" name="rate" placeholder="Rate" required>
<br><br>

<textarea name="pdesc" placeholder="Product Description"
style="width:90%;height:120px;border-radius:8px;padding:10px;"
required></textarea>

<br><br>

<input type="text" name="quality" placeholder="Quality" required>
<br><br>

<input type="number" name="stock"
placeholder="Available Stock (in Tons)" required>
<br><br>

<label>Select Product Image</label>
<br><br>

<input type="file" name="image" accept="image/*" required>

<br><br>

<button type="submit">Add Product</button>

</form>

</div>

</div>

</div> <!-- admin-main ends here -->