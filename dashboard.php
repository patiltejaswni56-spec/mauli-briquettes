<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#f4f4f4;
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
    transition:0.3s;
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
.content{
    margin-left:250px;
    padding:30px;
}

.content h1{
    color:#14532d;
    margin-bottom:20px;
}

/* Cards */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    text-align:center;
}

.card h3{
    margin-bottom:15px;
    color:#14532d;
}

.card a{
    display:inline-block;
    padding:10px 15px;
    background:#16a34a;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.card a:hover{
    background:#166534;
}

/* Menu Button */
.menu-btn{
    display:none;
    font-size:30px;
    position:fixed;
    top:15px;
    left:15px;
    cursor:pointer;
    z-index:1001;
}

/* Responsive */
@media(max-width:768px){
    .sidebar{
        left:-250px;
    }

    .sidebar.active{
        left:0;
    }

    .content{
        margin-left:0;
        padding-top:70px;
    }

    .menu-btn{
        display:block;
    }
}
</style>

</head>

<body>

<div class="menu-btn" onclick="toggleMenu()">☰</div>

<div class="sidebar" id="sidebar">
    <h2>Admin Panel</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="addproduct.php">➕ Add Product</a>
    <a href="viewproducts.php">📦 View Products</a>
    <a href="updateproduct.php">✏ Update Product</a>
    <a href="deleteproduct.php">🗑 Delete Product</a>
    <a href="vieworders.php">📋 View Orders</a>
    <a href="adminlogout.php">🚪 Logout</a>
</div>

<div class="content">
    <h1>Welcome Admin 👋</h1>

    <div class="cards">

        <div class="card">
            <h3>Add Product</h3>
            <a href="addproduct.php">Open</a>
        </div>

        <div class="card">
            <h3>View Products</h3>
            <a href="viewproducts.php">Open</a>
        </div>

        <div class="card">
            <h3>Update Product</h3>
            <a href="updateproduct.php">Open</a>
        </div>

        <div class="card">
            <h3>Delete Product</h3>
            <a href="deleteproduct.php">Open</a>
        </div>

        <div class="card">
            <h3>View Orders</h3>
            <a href="vieworders.php">Open</a>
        </div>

        <div class="card">
            <h3>Product Report</h3>
            <a href="productreport.php">Open</a>
        </div>

    </div>
</div>

<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");
}
</script>

</body>
</html>