<?php
include "db.php";

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Products</title>

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

<img src="images/<?php echo $row['image']; ?>">

<h3><?php echo $row['productname']; ?></h3>

<p><b>Rate :</b> ₹<?php echo $row['rate']; ?></p>

<p><?php echo $row['pdesc']; ?></p>

<p><b>Quality :</b> <?php echo $row['quality']; ?></p>

</div>

<?php
}
?>

</div>
</div>



</body>
</html>