<?php
include "db.php";

$id = $_POST['id'];
$status = $_POST['status'];
$delivery_days = $_POST['delivery_days'];

mysqli_query($conn,"
UPDATE orders
SET status='$status',
delivery_days='$delivery_days'
WHERE id='$id'
");

header("Location:vieworders.php");
exit();
?>