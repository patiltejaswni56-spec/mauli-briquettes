<?php
include "db.php";

$result = mysqli_query($conn,"SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>

<title>View Orders</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}

th{
    background:green;
    color:white;
}

select{
    padding:5px;
    width:150px;
}

button{
    background:green;
    color:white;
    border:none;
    padding:8px 15px;
    cursor:pointer;
}

button:hover{
    background:darkgreen;
}

</style>

</head>

<body>

<h2>All Orders</h2>

<table>

<tr>
    <th>ID</th>
    <th>Email</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Payment</th>
    <th>Status</th>
    <th>Estimated Delivery</th>
    <th>Update</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<form action="updatestatus.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">


<td><?php echo $row['id']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['productname']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>₹<?php echo $row['total']; ?></td>

<td><?php echo $row['payment']; ?></td>

<td>

<select name="status">

<option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>

<option value="Confirmed" <?php if($row['status']=="Confirmed") echo "selected"; ?>>Confirmed</option>

<option value="Processing" <?php if($row['status']=="Processing") echo "selected"; ?>>Processing</option>

<option value="Shipped" <?php if($row['status']=="Shipped") echo "selected"; ?>>Shipped</option>

<option value="Out for Delivery" <?php if($row['status']=="Out for Delivery") echo "selected"; ?>>Out for Delivery</option>

<option value="Delivered" <?php if($row['status']=="Delivered") echo "selected"; ?>>Delivered</option>

<option value="Cancelled" <?php if($row['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>

</select>

</td>

<td>

<select name="delivery_days">

<option value="-" <?php if($row['delivery_days']=="-") echo "selected"; ?>>-</option>

<option value="Today" <?php if($row['delivery_days']=="Today") echo "selected"; ?>>Today</option>

<option value="Tomorrow" <?php if($row['delivery_days']=="Tomorrow") echo "selected"; ?>>Tomorrow</option>

<option value="2 Days" <?php if($row['delivery_days']=="2 Days") echo "selected"; ?>>2 Days</option>

<option value="3 Days" <?php if($row['delivery_days']=="3 Days") echo "selected"; ?>>3 Days</option>

<option value="5 Days" <?php if($row['delivery_days']=="5 Days") echo "selected"; ?>>5 Days</option>

<option value="7 Days" <?php if($row['delivery_days']=="7 Days") echo "selected"; ?>>7 Days</option>

<option value="Delivered" <?php if($row['delivery_days']=="Delivered") echo "selected"; ?>>Delivered</option>

</select>

</td>

<td>

<button type="submit">Update</button>
</td>
</form>
</tr>


<?php
}
?>

</table>

</body>
</html>