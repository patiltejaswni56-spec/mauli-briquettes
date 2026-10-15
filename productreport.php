<?php
include "db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Parameterized Product Report</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f4f4;
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

.header{
    background:green;
    color:white;
    text-align:center;
    padding:20px;
    font-size:30px;
    font-weight:bold;
}

.navbar{
    background:#14532d;
    padding:15px;
    text-align:center;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin:15px;
    font-weight:bold;
}



table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table,th,td{
    border:1px solid black;
}

th{
    background:green;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
}

select,input[type=submit]{
    padding:10px;
    margin:5px;
}

.footer{
    background:black;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:auto;
    margin-left:250px;
}
/* Sidebar */
.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100%;
    background:#14532d;
    padding-top:20px;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px 20px;
    text-decoration:none;
    border-bottom:1px solid rgba(255,255,255,0.2);
}

.sidebar a:hover{
    background:#166534;
}

/* Content */
.container{
    margin-left:250px;
    padding:20px;
    flex:1;
}

</style>

</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<div class="sidebar">
    <h2>Admin Panel</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="addproduct.php">➕ Add Product</a>
    <a href="viewproducts.php">📦 View Products</a>
    <a href="updateproduct.php">✏ Update Product</a>
    <a href="deleteproduct.php">🗑 Delete Product</a>
    <a href="vieworders.php">📋 View Orders</a>
    <a href="productreport.php">📊 Product Report</a>
    <a href="adminlogout.php">🚪 Logout</a>
</div>
<div id="overlay" class="overlay" onclick="closeMenu()"></div>
<div class="container">

<h2 align="center">Parameterized Product Report</h2>

<form method="POST" align="center">

<select name="quality" required>
<option value="">Select Quality</option>
<option value="Best">Best</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select>

<input type="submit" name="search" value="Search">

</form>

<br>

<table>

<tr>
<th>ID</th>
<th>Product Name</th>
<th>Rate</th>
<th>Description</th>
<th>Quality</th>
</tr>

<?php

if(isset($_POST['search']))
{
    $a = $_POST['quality'];

    $result = mysqli_query($conn,
    "SELECT * FROM products WHERE quality='$a'");

    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['productname']."</td>";
        echo "<td>".$row['rate']."</td>";
        echo "<td>".$row['pdesc']."</td>";
        echo "<td>".$row['quality']."</td>";
        echo "</tr>";
    }
}

?>

</table>

</div>

<div class="footer">
© 2026 Mauli Briquettes Management System 
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