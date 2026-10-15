<?php
include "db.php";

/* DELETE PRODUCT */
if(isset($_GET['id']))
{
    $id = intval($_GET['id']);

    $imageResult = mysqli_query($conn, "SELECT image FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($imageResult);

    // safe delete image
    if($row && !empty($row['image']))
    {
        $imgPath = "images/".$row['image'];

        if(file_exists($imgPath))
        {
            unlink($imgPath);
        }
    }

    mysqli_query($conn, "DELETE FROM products WHERE id=$id");

    echo "<script>
        alert('Product Deleted Successfully');
        window.location='viewproducts.php';
    </script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Product</title>

<link rel="stylesheet" href="style.css">

<style>

.main-content{
    margin-left:260px;
    padding:20px;
}

.container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
}

.card{
    width:250px;
    background:white;
    padding:15px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    text-align:center;
}

.card img{
    width:100%;
    height:150px;
    object-fit:cover;
    border-radius:8px;
}

button{
    background:red;
    color:white;
    border:none;
    padding:10px;
    width:100%;
    cursor:pointer;
    border-radius:5px;
}

button:hover{
    background:darkred;
}
</style>

</head>

<body>

<div class="header">
🌿 MAULI BRIQUETTES MANAGEMENT SYSTEM
</div>

<?php include "sidebar.php"; ?>

<div id="overlay" class="overlay" onclick="closeMenu()"></div>

<div class="main-content">

<h2 style="text-align:center;">Delete Products</h2>

<?php
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>

<div class="container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="card">

<img src="images/<?php echo $row['image']; ?>">

<h3><?php echo $row['productname']; ?></h3>

<p>₹<?php echo $row['rate']; ?></p>

<p><?php echo $row['quality']; ?></p>

<a href="deleteproduct.php?id=<?php echo $row['id']; ?>"
   onclick="return confirm('Are you sure you want to delete this product?')">

<button>Delete</button>

</a>

</div>

<?php } ?>

</div>

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