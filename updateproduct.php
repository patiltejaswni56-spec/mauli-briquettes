<?php
include "db.php";

$result=mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Product</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<?php include "sidebar.php"; ?>

<div class="admin-main">
<div class="container">

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<div class="card">

<img src="images/<?php echo $row['image']; ?>" width="200">

<h3><?php echo $row['productname']; ?></h3>

<p>₹<?php echo $row['rate']; ?></p>

<a href="editproduct.php?id=<?php echo $row['id']; ?>">
<button>Edit Product</button>
</a>

</div>

<?php
}
?>

</div>

</div>



</body>
</html>